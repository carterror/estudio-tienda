<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        # code...
        $this->middleware('auth');
        $this->middleware('estado');
        
    }
    public function getUserEdit()
    {
        
        return view('user.edit');
        
    }

    public function postUserEditAvatar(Request $request)
    {
        
        $rules = [
            'image' => 'required|image'
        ];

        $message = [
            'image.required' => 'Seleccione una imagen',
            'image.image' => 'Seleccione una imagen',          
        ];

        $validator = validator($request->all(), $rules, $message);
        if($validator->fails()):
            return back()->withErrors($validator)->with("icon", "fa-exclamation-triangle")->with("message", "Se ha producido errores:")->with("typealert", "danger");
        else:
            if ($request->hasFile('image')):
                $path = '/usuarios//'.Auth::id();
                $fileExt = trim($request->image->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt,'',$request->image->getClientOriginalName()));
    
                $filename= rand(1,999).'-avatar-'.$name.'.'.$fileExt;
                $final_file= $upload_path.'/'.$path.'/'.$filename;
    
              endif; 
              $u = User::find(Auth::id());
              if(is_null($u->avatar)): 
                $meto = "add";
              else: 
                $meto = "edit";
                $ip = $u->avatar;
              endif;
                $u->avatar = $filename;

              if($u->save()):
                if($request->hasFile('image')):
                    $fl= $request->image->storeAs($path, $filename, 'uploads');
                    $img = Image::make($final_file);
                    $img->fit(256, 256, function ($constraint){
                        $constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/t_'.$filename);
                    if($meto == "add"): 
                    else:
                    unlink($upload_path.'/usuarios//'.Auth::id().'/'.$ip);
                    unlink($upload_path.'/usuarios//'.Auth::id().'/t_'.$ip);
                    endif;
                endif;
                 return back()->with("icon", "fa-check")->with("message", "Avatar actualizado con éxito")->with("typealert", "success");
             endif;

        endif;

    }

    public function postUserEditPass(Request $request)
    {
        
        $rules = [
            'passa' => 'required|min:8',
            'pass' => 'required|min:8',
            'passc' => 'required|same:pass'
        ];

        $message = [
            'passa.required' => 'Escriba su contraseña actual',
            'pass.required' => 'Escriba su nueva contraseña',
            'passn.required' => 'Confirme su nueva contraseña, por favor',
        ];

        $validator = validator($request->all(), $rules, $message);
        if($validator->fails()):
            return back()->withErrors($validator)->with("icon", "fa-exclamation-triangle")->with("message", "Se ha producido errores:")->with("typealert", "danger");
        else:
            $u = User::find(Auth::id());
                if (Hash::check($request->passa, $u->password)):
                    $u->password = Hash::make($request->pass);
                else: 
                    return back()->with("icon", "fa-exclamation-triangle")->with("message", "Su contraseña actual es incorrecta")->with("typealert", "danger");
                endif;
            if($u->save()):
                return back()->with("icon", "fa-check")->with("message", "Contraseña actualizada con éxito")->with("typealert", "success");
            endif;
        endif;

    }

    public function postUserEditInfo(Request $request)
    {
        
        $rules = [
            'name' => 'required',
            'apellido' => 'required',
            'phone' => 'required|min:8',
        ];

        $message = [
            'phone.min' => 'Inserte un número de teléfono correcto, por favor',
        ];

        $validator = validator($request->all(), $rules, $message);
        if($validator->fails()):
            return back()->withErrors($validator)->with("icon", "fa-exclamation-triangle")->with("message", "Se ha producido errores:")->with("typealert", "danger")->withInput();
        else:
            $u = User::find(Auth::id());

            $u->name = $request->name;
            // $u->apellido = $request->apellido;
            $u->phone = $request->phone;
            $u->nacimiento = $request->nace;
            $u->genero = $request->genero;
            $u->direccion = $request->direccion;

            if($u->save()):
                return back()->with("icon", "fa-check")->with("message", "Información actualizada con éxito")->with("typealert", "success");
            endif;
        endif;

    }

}
