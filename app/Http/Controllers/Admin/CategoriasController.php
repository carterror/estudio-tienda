<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Categoria;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\New_;

class CategoriasController extends Controller
{
    public function __Construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
        $this->middleware('permisos');
        $this->middleware('estado');
    }

    public function getHome($modulo)
    {
        $cats = Categoria::where('module', $modulo)->orderBy('name', 'Asc')->get();
        $data = ['cats' => $cats];
        
        return view('admin.categorias.home', $data);
    }  

    public function postCategoryAdd(Request $request)
    {
        $rules = [
            'name' => 'required',
            'icon' => 'required',
        ];


        $request->validate($rules);
        
        $c = New Categoria;

        $c->module = $request->modulo;
        $c->name = e($request->name);
        $c->slug = Str::slug($request->name);
        $c->icon = e($request->icon);

        if($c->save()):
            return redirect('/admin/categorias/'.$c->module.'')->with("icon", "fa-check")->with("message", "Guardado con éxito")->with("typealert", "success");
        endif;

       // return view("admin.categorias.index");
    }

    public function getCategoryEdit($id)
    {
        $cat = Categoria::find($id);
        $data = ['cat' => $cat];
        
        return view('admin.categorias.edit', $data);
    } 

    public function postCategoryEdit(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'icon' => 'required',
        ];


        $request->validate($rules);
        
        $c = Categoria::find($id);

        $c->module = $request->modulo;
        $c->name = e($request->name);
        $c->icon = $request->icon;

        if($c->save()):
            return redirect('/admin/categorias/'.$c->module.'')->with("icon", "fa-check")->with("message", "Guardado con éxito")->with("typealert", "success");
        endif;

       // return view("admin.categorias.index");
    }

    public function postCategoryDelete($id)
    {
        $c = Categoria::find($id);
        if($c->delete()):
            return back()->with("icon", "fa-check")->with("message", "Eliminado con éxito")->with("typealert", "success");
        endif;

    }

}
