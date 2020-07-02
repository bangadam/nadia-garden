<?php

namespace App\Http\Controllers;

use App\Category;
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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::orderBy('display_order')->get();
        return view('home', compact('category'));
    }

    public function menu() {
        $categories = Category::with('menuItems')->orderBy('display_order')->get();
        return view('menu', compact('categories'));
    }
}
