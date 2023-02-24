<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Category;

class ProductController extends Controller
{
    public function all(Request  $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('id');
        $categories = $request->input('categories');


        // mengambil data secara individual atau berdasarkan id
        if ($id) {
            // ambil dari model product dan ambil relasi "galleries", "category"
            // pakai fungsi find untuk mengambil data
            $product = Category::with(['galleries'])->find($id);
            // bikin kondisi jika datanya ada atau tidak ada
            if ($product) {
                // ResponseFormatter dari API yang dibuat sendiri
                return ResponseFormatter::success($product, 'Data produk berhasil diambil');
            } else {
                return ResponseFormatter::error(null, 'Data produk tidak ada', 404);
            }
        }
        // ambil semua data
        $product = Category::with(['galleries']);

        // filtering
        if ($name) {
            // mencari nama berdasarkan sebagian text
            $product->where('name', 'like', '%' . $name . '%');
        }


        // categories
        if ($categories) {
            // jika categories sama dengan categories
            $product->where('categories_id', $categories);
        }

        // ambil data dari semuanya yang ada disini
        return ResponseFormatter::success($product->paginate($limit), 'Data list berhasil diambil');
    }
}
