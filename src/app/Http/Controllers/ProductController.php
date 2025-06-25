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
        $products = Product::all();

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
        $validated = $request->validated();
        $validated['image'] = $request->file('image')->store('images', 'public');

        Product::create($validated);

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
    public function search(Request $request)
    {
        if ($request->has('reset')) {
            return redirect('/products')->withInput();
        }

        $products = Product::with('season')
            ->keywordSearch($request->input('keyword'))
            ->paginate(6)
            ->appends($request->except('page')); //ページを渡っても検索条件を引き継ぐ

        return view('index', compact('products'));
    }

    // 商品削除処理
    public function destroy(Request $request)
    {
        Product::find($request->id)->delete();

        return redirect('/products');
    }
}
