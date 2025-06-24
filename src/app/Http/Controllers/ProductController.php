<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;

class ProductController extends Controller
{
    // 一覧画面
    public function index()
    {
        $products = Product::only('name', 'price', 'image');

        return view('index', compact('products'));
    }

    // 登録画面
    public function register()
    {
        $seasons = Season::all();

        return view('register', compact('seasons'));
    }

    // 登録処理
    public function store(ProductFormRequest $request)
    {
        $form = $request->all();
        Product::create($form);

        return redirect('/products');
    }

    // 詳細画面
    public function show()
    {
        $products = Product::all();
        $seasons = Season::all();

        return view('detail', compact('products', 'seasons'));
    }

    // 更新処理
    public function update(ProductFormRequest $request)
    {
        $form = $request->all();
        Product::find($request->id)->update($form);

        return redirect('/products');
    }

    // 商品検索
    public function search()
    {
        //
    }

    // 商品削除処理
    public function destroy(Request $request)
    {
        Product::find($request->id)->delete();

        return redirect('/products');
    }
}
