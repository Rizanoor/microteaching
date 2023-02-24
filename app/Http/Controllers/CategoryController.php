<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $galleries = Gallery::with(['galleries'])->paginate(32);

        return view('pages.category', [
            'categories' => $categories,
            'galleries' => $galleries
        ]);
    }
    public function detail(Request $request, $slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();
        $galleries = Gallery::with(['galleries'])->where('categories_id', $category->id)->paginate(32);

        return view('pages.category', [
            'categories' => $categories,
            'galleries' => $galleries
        ]);
    }
}
