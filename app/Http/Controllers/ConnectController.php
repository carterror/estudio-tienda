<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\UserSendRecover;
use App\Mail\UserSendNewPass;


class ConnectController extends Controller
{
    public function __construct()
    {
        # code...
        $this->middleware('guest')->except(['getLogout']);
        
    }
    //
    public function getLogin()
    {
        # code...
        return view("connect.login");
    }

    public function getLogout()
    {
        $estado = Auth::User()->status;
        if($estado =="100"):
            Auth::logout();
            return redirect('/login')->with("icon", "fa-exclamation-triangle")->with("message", "Su cuenta fue suspendida")->with("typealert", "danger");
        else:
            Auth::logout();
            return redirect('/login');
        endif;
    }

    public function postLogin(Request $request)
    {
        # code...
        $rules = [
            "email" => "required|email",
            "password" => "required|min:8"
        ];

        $request->validate($rules);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true)){
            if(Auth::User()->status =="100"):
                return redirect('/logout');
            else:
                 return redirect('/');
            endif;
        }
        else {
            //return ("$request->email, $request->password");
            return redirect('/login')->with("icon", "fa-check")->with("message", "Los datos de su cuenta son incorrectos")->with("typealert", "danger");
        } 

        }

    public function getRegister()
    {
        # code...
        return view("connect.register");
    }

    public function postRegister(Request $request)
    {
        # code...

        // $request->validate([
        //     "name" => "required",
        //     "email" => "required|email|unique",
        //     "password" => "required|min:8",
        //     "cpassword" => "same:password",
        // ]);
        $rules = [
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8",
            "cpassword" => "same:password",
        ];

        $request->validate($rules);
        // if($request->fails());
        //     return back()->withErrors($request)->with('message', 'se ha prodicido un error', 'typealert', 'danger');
        $user = new User;

        $user->name= e($request->name);
        $user->email= e($request->email);
        $user->password= Hash::make($request->password);

        if($user->save()):
            return redirect('/login')->with("message", "Su Cuenta ha sido creada correctamente...")->with("typealert", "success");
        endif;

    }


    public function getRecove()
    {
        # code...
        return view("connect.recove");
    }

    public function postRecove(Request $request)
    {
        $rules = [
            "email" => "required|email",
        ];

        $request->validate($rules);
        // if($request->fails());
        //     return back()->withErrors($request)->with('message', 'se ha prodicido un error', 'typealert', 'danger');

        $user = User::where('email', $request->email)->count();
        
        if($user == "1"):
            $user = User::where('email', $request->email)->first();
            $code = rand(100000, 900000);
            $data = ['name' => $user->name, 'email' => $user->email, 'code' => $code];
            $u = User::find($user->id);
            $u->password_code = $code;
            if($u->save()):
            Mail::to($user->email)->send(new UserSendRecover($data));
            return redirect('/reset?email='.$user->email)->with("icon", "fa-check")->with("message", "Ingrese el código que le hemos enviado a su correo electrónico")->with("typealert", "warning");
            endif;
        else:
            return back()->with("icon", "fa-exclamation-triangle")->with("message", "Su correo electrónico no existe")->with("typealert", "danger");
        endif;
       
    }

    public function getReset(Request $request)
    {
        $data = ['email' => $request->email, 'code' => $request->password_code];
        return view('connect.reset', $data);
    }
    public function postReset(Request $request)
    {
        $rules = [
            "email" => "required|email",
            "code" => "required",
            "pass" => "required|min:8",
        ];

        $request->validate($rules);
        // if($request->fails());
        //     return back()->withErrors($request)->with('message', 'se ha prodicido un error', 'typealert', 'danger');

        $user = User::where('email', $request->email)->where('password_code', $request->code)->count();

        if($user == "1"): 
            $user = User::where('email', $request->email)->where('password_code', $request->code)->first();
            $new_pass = $request->pass;
            $user->password = Hash::make($new_pass);
            $user->password_code = null;
            $data = ['name' => $user->name, 'password' => $new_pass, 'email' => $user->email];
            if($user->save()): 
                Mail::to($user->email)->send(new UserSendNewPass($data));
                return redirect('/login?email='.$user->email)->with("icon", "fa-check")->with('message', 'Su contraseña fue restablecida con éxito, revise su correo electrónico...')->with("typealert", "success");
            endif;
        else: 
            return back()->with("icon", "fa-exclamation-triangle")->with('message', 'Los datos son erróneos')->with("typealert", "danger");
        endif;
    }
    
}
