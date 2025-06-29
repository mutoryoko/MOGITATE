<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductSearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $sort = $request->input('sort');
        $query = Product::query();

        if($keyword){
            $query->keywordSearch($keyword);
        }

        if ($sort === 'asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'desc') {
            $query->orderBy('price', 'desc');
        }

        $products = $query->paginate(6)->appends($request->query());

        return view('index', compact('products', 'keyword', 'sort'));
    }
}
