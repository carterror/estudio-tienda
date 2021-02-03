<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use Illuminate\Support\Facades\Config;

class ApiJsController extends Controller
{
    public function getPSection($section, Request $request)
    {
        $items_page = Config::get('ventagran.product_pag');
        switch ($section):
            case 'home':
                $p = Product::where('estado', 1)->inRandomOrder()->paginate($items_page);
                break;
            
            default:
                $p = Product::where('estado', 1)->inRandomOrder()->paginate($items_page);
                break;
        endswitch;
        return $p;
    }
}
