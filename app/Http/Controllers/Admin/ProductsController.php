<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
use Intervention\Image\Facades\Image;

use App\Models\Categoria;
use App\Models\Product;
use App\Models\PGaleria;

class ProductsController extends Controller
{
    public function __Construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
        $this->middleware('permisos');
        $this->middleware('estado');
    }

    public function getHome($estado)
    {
        switch ($estado) {
            case '0':
                $producto = Product::with(['cat'])->where('estado', '0')->orderBy('id', 'desc')->paginate(8);
                break;
            case '1':
                $producto = Product::with(['cat'])->where('estado', '1')->orderBy('id', 'desc')->paginate(8);
                break;
            case 'all':
                $producto = Product::with(['cat'])->orderBy('id', 'desc')->paginate(8);
                break;
            case 'reci':
                $producto = Product::with(['cat'])->onlyTrashed()->orderBy('id', 'desc')->paginate(8);
                break;
            
            default:
                $producto = Product::with(['cat'])->orderBy('id', 'desc')->paginate(8);
                break;
        }
        
        $data = ['producto' => $producto];
        return view('admin.products.home', $data);
    }  

    public function getProductsAdd()
    {
        $cats = Categoria::where('module', '0')->pluck('name', 'id');
        $data = ['cats' => $cats];

        return view('admin.products.add', $data);
    }  

    public function postProductsAdd(Request $request)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'img' => 'required|image',
            'content' => 'required'
        ];

        $message = [
            'name.required' => 'El nombre del producto es requerido',
            'img.required' => 'Seleccione una imagen',
            'img.image' => 'Seleccione una imagen',
            'price.required' => 'Ingrese un precio del producto',
            'content.required' => 'Ingrese una descripción del producto'
        ];

        $validator = validator($request->all(), $rules, $message);
        if($validator->fails()):
            return back()->withErrors($validator)->with("icon", "fa-exclamation-triangle")->with("message", "Se ha producido errores:")->with("typealert", "danger")->withInput();
        else:

             $producto = New Product;

              $producto->estado = '0';
              $producto->codigo = e($request->codigo);
              $producto->name = e($request->name);
              $producto->slug = Str::slug($request->name);
              $producto->categoria_id = $request->categoria;
              if ($request->hasFile('img')):
                $path = '/'.date('Y-m-d'); //2020-02-14
                $fileExt = trim($request->img->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt,'',$request->img->getClientOriginalName()));
    
                $filename= rand(1,999).'-'.$name.'.'.$fileExt;
                $final_file= $upload_path.'/'.$path.'/'.$filename;
    
                $producto->file_path = date('Y-m-d');
                $producto->image = $filename;
              endif;   
              
              $producto->precio = e($request->price);
              $producto->inventario = $request->inventario;
              $producto->in_discount = $request->endescuento;
              $producto->discount = $request->descuento;
              $producto->contenido = e($request->content);

             if($producto->save()):
                if($request->hasFile('img')):
                    $fl= $request->img->storeAs($path, $filename, 'uploads');
                    $img = Image::make($final_file);
                    $img->fit(256, 256, function ($constraint){
                        $constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/t_'.$filename);
                endif;
                 return redirect('/admin/products/all')->with("icon", "fa-check")->with("message", "Guardado con éxito")->with("typealert", "success");
             endif;
        endif;

        //return view('admin.products.add', $data);
    }  
//video 29
    public function getProductsEdit($id)
    {
        $p = Product::findOrFail($id);
        
        $cats = Categoria::with(['cat'])->where('module', '0')->pluck('name', 'id');
        $data = ['cats' => $cats, 'p' => $p];

        return view('admin.products.edit', $data);
        // $producto = Product::find($id);
        // $data = ['producto' => $producto];
        // return view('admin.products.edit', $data);
    }  

    public function postProductsEdit(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'img' => 'image',
            'content' => 'required'
        ];

        $message = [
            'name.required' => 'El nombre del producto es requerido',
            'img.image' => 'Seleccione una imagen',
            'price.required' => 'Ingrese un precio del producto',
            'content.required' => 'Ingrese una descripción del producto'
        ];

        $validator = validator($request->all(), $rules, $message);
        if($validator->fails()):
            return back()->withErrors($validator)->with("icon", "fa-exclamation-triangle")->with("message", "Se ha producido errores:")->with("typealert", "danger")->withInput();
        else:
             $producto = Product::findOrFail($id);

              $producto->estado = $request->estado;
              $producto->codigo = e($request->codigo);
              $ipp = $producto->file_path;
              $ip = $producto->image;
              $producto->name = e($request->name);
              $producto->categoria_id = $request->categoria;
              if ($request->hasFile('img')):
                $path = '/'.date('Y-m-d'); //2020-02-14
                $fileExt = trim($request->img->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt,'',$request->img->getClientOriginalName()));
    
                $filename= rand(1,999).'-'.$name.'.'.$fileExt;
                $final_file= $upload_path.'/'.$path.'/'.$filename;
    
                $producto->file_path = date('Y-m-d');
                $producto->image = $filename;
              endif;     
              $producto->precio = e($request->price);
              $producto->inventario = $request->inventario;
              $producto->in_discount = $request->endescuento;
              $producto->discount = $request->descuento;
              $producto->contenido = e($request->content);

             if($producto->save()):
                if($request->hasFile('img')):
                    $fl= $request->img->storeAs($path, $filename, 'uploads');
                    $img = Image::make($final_file);
                    $img->fit(256, 256, function ($constraint){
                        $constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/t_'.$filename);
                    unlink($upload_path.'/'.$ipp.'/'.$ip);
                    unlink($upload_path.'/'.$ipp.'/t_'.$ip);
                endif;
                 return back()->with("icon", "fa-check")->with("message", "Actualizado con éxito")->with("typealert", "success");
             endif;
        endif;
    }  

    public function postProductsDelete($id)
    {
        $p = Product::find($id);
        if($p->delete()):
            return back()->with("icon", "fa-check")->with("message", "Eliminado con éxito")->with("typealert", "success");
        endif;
    }

    public function postProductsRestaurar($id)
    {
        $p = Product::onlyTrashed()->where('id', $id)->first();
        if($p->restore()):
            return back()->with("icon", "fa-check")->with("message", "Restaurado con éxito")->with("typealert", "success");
        endif;
    }

    public function postProductsEliminar($id)
    {
        $p = Product::onlyTrashed()->where('id', $id)->first();
        $ipp = $p->file_path;
        $ip = $p->image;
        $upload_path = Config::get('filesystems.disks.uploads.root');
        if($p->forceDelete()):
            unlink($upload_path.'/'.$ipp.'/'.$ip);
            unlink($upload_path.'/'.$ipp.'/t_'.$ip);
            return back()->with("icon", "fa-check")->with("message", "Restaurado con éxito")->with("typealert", "success");
        endif;
    }

    public function postProductsGaleriaAdd(Request $request, $id)
        {
            $rules = [
                'file_image' => 'required'
            ];
    
            $message = [
                'file_image.image' => 'Seleccione una imagen',          
            ];
    
            $validator = validator($request->all(), $rules, $message);
            if($validator->fails()):
                return back()->withErrors($validator)->with("icon", "fa-exclamation-triangle")->with("message", "Se ha producido errores:")->with("typealert", "danger")->withInput();
            else:
                if ($request->hasFile('file_image')):
                    $path = '/'.date('Y-m-d'); //2020-02-14
                    $fileExt = trim($request->file_image->getClientOriginalExtension());
                    $upload_path = Config::get('filesystems.disks.uploads.root');
                    $name = Str::slug(str_replace($fileExt,'',$request->file_image->getClientOriginalName()));
        
                    $filename= rand(1,999).'-'.$name.'.'.$fileExt;
                    $final_file= $upload_path.'/'.$path.'/'.$filename;
        
                  endif; 
                  $g = new PGaleria;

                  $g->producto_id = $id;
                  $g->file_path = date('Y-m-d');
                  $g->file_name = $filename;

                  if($g->save()):
                    if($request->hasFile('file_image')):
                        $fl= $request->file_image->storeAs($path, $filename, 'uploads');
                        $img = Image::make($final_file);
                        $img->fit(256, 256, function ($constraint){
                            $constraint->upsize();
                        });
                        $img->save($upload_path.'/'.$path.'/t_'.$filename);
                    endif;
                     return back()->with("icon", "fa-check")->with("message", "Imagen subida con éxito")->with("typealert", "success");
                 endif;

            endif;

        }

        public function postProductsGaleriaDelete($id, $gid)
        {

            $g = PGaleria::findOrFail($gid); 
            $path = $g->file_path;
            $file = $g->file_name;
            $upload_path = Config::get('filesystems.disks.uploads.root');

            if($g->producto_id != $id){
                return back()->with("icon", "fa-exclamation-triangle")->with("message", "No puede eliminar la imagen")->with("typealert", "danger");
            }
            else{
                if($g->delete()): 
                    unlink($upload_path.'/'.$path.'/'.$file);
                    unlink($upload_path.'/'.$path.'/t_'.$file);
                    return back()->with("icon", "fa-check")->with("message", "Imagen eliminada con éxito")->with("typealert", "success");
                endif;
            }

        }
        public function postProductsBuscar(Request $request)
        {
 
            $rules = [
                'buscar' => 'required',
                'filtro' => 'required',
            ];
    
            $message = [
                'buscar.required' => 'Por favor introduzca correctamente los datos de busqueda', 
                'filtro.required' => 'Por favor introduzca correctamente los datos de busqueda',         
            ];

            $validator = validator($request->all(), $rules, $message);
            if($validator->fails()):
                return back()->withErrors($validator)->with("icon", "fa-exclamation-triangle")->with("message", "Se ha producido errores:")->with("typealert", "danger");
            else:
                switch ($request->filtro) {
                    case '0':
                        $producto = Product::with(['cat'])->where('name', 'LIKE', '%'.$request->buscar.'%')->orderBy('id', 'desc')->paginate(8);
                        break;
                    case '1':
                        $producto = Product::with(['cat'])->where('codigo', 'LIKE', '%'.$request->buscar.'%')->orderBy('id', 'desc')->paginate(8);
                        break;
                    
                    default:
                        $producto = Product::with(['cat'])->orderBy('id', 'desc')->paginate(8);
                        break;
                }

                $data = ['producto' => $producto];
                return view('admin.products.home', $data);

            endif;
        }
            
}
