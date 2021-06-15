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
     * Muestra la vista de home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
