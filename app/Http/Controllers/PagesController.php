<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home () {
        $titulo = 'Prueba Desarrollador';
        //$user = Auth::user();
        return view('index', [
            'title' => $titulo/*,
            'user' => $user*/
        ]);
    }
}
