<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
        $this->middleware('permisos');
        $this->middleware('estado');
    }
    
    public function getUsers($estado)
    {
        if($estado == "all"):
            $users = User::orderBy('id', 'Desc')->paginate(8);
        else: 
            $users = User::where('status', $estado)->orderBy('id', 'Desc')->paginate(8);
        endif;

        $data = ['users' => $users];
        return view('admin.users.home', $data);
    }

    public function getUsersEdit($id)
    {
        $users = User::findOrFail($id);
        $data = ['users' => $users];
        return view('admin.users.edit', $data);
    }

    public function postUsersEdit(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->role = $request->tipo;
        $redirect = back();
        $msg = 'El tipo de cuenta y permisos del usuario se actualizaron correctamente';
        if($request->tipo == "1"):
            $redirect = redirect("/admin/users/".$users->id."/permisos");
            $msg = 'El tipo de cuenta y permisos del usuario se actualizaron correctamente';
            if(is_null($users->permisos)): 
                $permisos = [
                    //inicio
                    'inicio' => true,
                ];
                $permisos = json_encode($permisos);
                $users->permisos = $permisos;
            endif;
        else: 
            $users->permisos = null;
        endif;
        if($users->save()):
            return $redirect->with("icon", "fa-check")->with("message", $msg)->with("typealert", "success");
        endif;

    }
    
    public function getUsersBan($id)
    {
        $users = User::findOrFail($id);

        if($users->status == "100"):
            $users->status = "0";
            $msg = "Suspención de cuenta terminada";
        else:
            $users->status = "100";
            $msg = "Cuenta de usuario suspendida";
        endif;

        if($users->save()):
             return back()->with("icon", "fa-check")->with("message", $msg)->with("typealert", "success");
        endif;
    }

    public function getUsersPermisos($id)
    {
        $users = User::findOrFail($id);
        $data = ['users' => $users];
        return view('admin.users.permisos', $data);
    }

    public function postUsersPermisos(Request $request, $id)
    {
        $users = User::findOrFail($id);

        $users->permisos = $request->except(['_token']);

        $msg = "Los permisos del usuario fueron actualizados con éxito";

        if($users->save()):
            return back()->with("icon", "fa-check")->with("message", $msg)->with("typealert", "success");

       endif;

    }


}
