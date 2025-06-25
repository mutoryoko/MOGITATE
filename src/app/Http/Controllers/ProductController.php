<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        $seasons = Season::all();

        return view('detail', compact('product', 'seasons'));
    }

    // 更新処理
    public function update(UpdateRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $updateData = $request->validated();

        //画像変更する場合
        if($request->has('image')) {
            // 変更前の画像削除、新しい画像の登録
            Storage::disk('public')->delete($product->image);
            $updateData['image'] = $request->file('image')->store('images', 'public');
        }
        $product->update($updateData);
        $product->seasons()->sync($updateData['seasons']);

        return redirect('/products');
    }

    // 商品検索
    public function search(Request $request)
    {
        $products = Product::where('name')
            ->keywordSearch($request->input('keyword'))
            ->paginate(6)
            ->appends($request->except('page')); //ページを渡っても検索条件を引き継ぐ

        return view('index', compact('products'));
    }

    // 商品削除処理
    public function destroy(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        Product::find($request->id)->delete();
        Storage::disk('public')->delete($product->image); // 画像も削除

        return redirect('/products');
    }
}
