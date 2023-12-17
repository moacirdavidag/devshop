<?php

namespace App\Http\Controllers;

class DevShopController extends Controller
{
    public function index() {
        $camisetas = \DB::table('produtos')->where('categoria_id', '=', '1')->take(4)->get();
        $acessorios = \DB::table('produtos')->where('categoria_id', '=', '3')->take(4)->get();
        return view('index', [
            'camisetas' => $camisetas,
            'acessorios' => $acessorios
        ]);
    }

}
