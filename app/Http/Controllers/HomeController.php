<?php

namespace App\Http\Controllers;

use App\Medicine;
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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Medicine::all();
        return view('storefront.home', compact('products'));
    }

    public function controlpanel()
    {
        $this->authorize('admin-view_any');
        return view('controlpanel.home');
    }
}
