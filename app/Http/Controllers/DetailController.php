<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $id)
    {
        $product = Category::with(['galleries'])->where('slug', $id)->firstOrFail();


        return view('pages.detail', [
            'product' => $product
        ]);
    }
}
