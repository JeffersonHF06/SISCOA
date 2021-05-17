<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Constructor del controller en el cual se agrega el middleware auth
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Método que redirige a la página principal o Home
     *
     */
    public function index()
    {
        return view('home');
    }
}
