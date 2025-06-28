<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductSearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::query();

        if($keyword){
            $products->keywordSearch($keyword);
        }

        $products = $products->paginate(6)->appends($request->except('page'));

        return view('index', compact('products'));
    }
}
