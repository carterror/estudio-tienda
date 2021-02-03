<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
use Intervention\Image\Facades\Image;

use App\Models\Slider;
use Illuminate\Support\Facades\Auth;

class ConfigController extends Controller
{
    public function __Construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
        $this->middleware('permisos');
        $this->middleware('estado');
    }

    public function getConfig()
    {
        return view('admin.config.home');
    }

    public function postConfig(Request $request)
    {

        $config = config_path('ventagran.php');
        if(!file_exists($config)): 
            fopen($config, 'w');
        endif;
        $array = $request->except(['_token']);
        $file = fopen($config, 'w');
        fwrite($file, '<?php'.PHP_EOL);
        fwrite($file, ''.PHP_EOL);
        fwrite($file, 'return [ '.PHP_EOL);
        fwrite($file, ''.PHP_EOL);
        foreach ($array as $key => $value):
            if(is_null($value)): 
                fwrite($file, '"'.$key.'" => null,'.PHP_EOL);
            elseif(is_numeric($value)):
                fwrite($file, '"'.$key.'" => '.$value.','.PHP_EOL);
            else:
                fwrite($file, '"'.$key.'" => "'.$value.'",'.PHP_EOL);
            endif;

            fwrite($file, ''.PHP_EOL);
        endforeach;

        if (fwrite($file, '];'.PHP_EOL)):

        fclose($file);
        return back()->with("icon", "fa-check")->with("message", "Configuraciones actualizadas con éxito")->with("typealert", "success");
        
        endif;
    }

    public function getSlider()
    {
        $slider = Slider::orderBy('sorden', 'Asc')->paginate(6);
        $data = ['slider' => $slider];
        return view('admin.slider.home', $data);
    }

    public function postSliderAdd(Request $request)
    {
        $rules = [
            'title' => 'required',
            'img' => 'required',
            'content' => 'required',
            'orden' => 'required',
            'estado' => 'required',
        ];

        $message = [
            'title.required' => 'El nombre del Banner es requerido',
            'img.required' => 'Seleccione una imagen',
            'orden.required' => 'Ingrese un número de órden',
            'content.required' => 'Ingrese una descripción',
            'estado.required' => 'Ingrese el estado',
        ];

        $validator = validator($request->all(), $rules, $message);
        if($validator->fails()):
            return back()->withErrors($validator)->with("icon", "fa-exclamation-triangle")->with("message", "Se ha producido errores:")->with("typealert", "danger")->withInput();
        else:

            $path = '/slider/'.date('Y-m-d'); //2020-02-14
            $fileExt = trim($request->img->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt,'',$request->img->getClientOriginalName()));
    
                $filename= rand(1,999).'-'.$name.'.'.$fileExt;
                $final_file= $upload_path.'/'.$path.'/'.$filename;

            $s = New Slider;

            $s->status = $request->estado;
            $s->user_id = Auth::id();
            $s->title = e($request->title);
            $s->sorden = e($request->orden);
            $s->content = e($request->content);

            $s->file_path = $path;
            $s->imagen = $filename;

             if($s->save()):
                if($request->hasFile('img')):
                    $fl= $request->img->storeAs($path, $filename, 'uploads');
                    $img = Image::make($final_file);
                    $img->resize(1024, 768, function ($constraint){
                        $constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/t_'.$filename);
                endif;
                 return back()->with("icon", "fa-check")->with("message", "Guardado con éxito")->with("typealert", "success");
             endif;
        endif;

        //return view('admin.products.add', $data);
    }  

    public function getSliderDelete($id)
    {
        $s = Slider::find($id);
        $upload_path = Config::get('filesystems.disks.uploads.root');
        $path = $s->file_path;
        $file = $s->imagen;
        if($s->delete()):
            unlink($upload_path.'/'.$path.'/'.$file);
            unlink($upload_path.'/'.$path.'/t_'.$file);
            return back()->with("icon", "fa-check")->with("message", "Eliminado con éxito")->with("typealert", "success");
        endif;
    }
}
