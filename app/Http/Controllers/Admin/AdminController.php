<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;

class AdminController extends Controller
{
    public function __Construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
        $this->middleware('permisos');
        $this->middleware('estado');
    }

    public function getAdmin()
    {
        $users = User::count();
        $product = Product::where('estado', "1")->count();
        $data = ['users' => $users, 'product' => $product];
        return view("admin.index", $data);
    }

}
