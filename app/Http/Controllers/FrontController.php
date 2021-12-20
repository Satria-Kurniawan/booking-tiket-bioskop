<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Film;

class FrontController extends Controller
{
    public function index()
    {
        $datafilm = Film::with('category')->get();
        $ct = Category::all();

        return view('welcome', compact('datafilm'), compact('ct'));
    }
}
