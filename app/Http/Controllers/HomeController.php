<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;
use App\Models\Slider;

class HomeController extends Controller
{
    public function getHome()
    {
        $cat = Categoria::where('module', 0)->orderby('name', 'Asc')->get();
        $slider = Slider::where('status', 0)->orderby('sorden', 'Asc')->get();
        $data = ['categorias' => $cat, 'slider' => $slider];
        return view('home', $data);
    } 


}
