<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function menu()
    {
        $categories = Category::orderBy('display_order')->get();
        return view('admin.menu-editor.index', compact('categories'));
    }
}
