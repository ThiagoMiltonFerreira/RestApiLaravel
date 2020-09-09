<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(function ($request, $next) {
            //dd('estou aqui no middleware do home controller');
            echo"<br>estou aqui no middleware do home controller <br>";
            return $next($request);
        });
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function teste()
    {
        //dd($ui);
        return "teste middleware";
    }
}
