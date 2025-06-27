<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Season;

class ProductController extends Controller
{
    // 一覧画面
    public function index(Request $request)
    {
        $select = $request->sort;

        switch ($select) {
            case 'asc':
                $products = Product::orderBy('price', 'asc')->get();
                break;
            case 'desc':
                $products = Product::orderBy('price', 'desc')->get();
                break;
            default:
                $products = Product::get();
                break;
        }
        return view('index', compact('products', 'select'));
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
        $validated['image'] = $request->file('image')->store('fruits-img', 'public');

        $product = Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'image' => $validated['image'],
            'description' => $validated['description'],
        ]);
        $product->seasons()->attach($validated['seasons']);

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
    public function update(ProductFormRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $updateData = $request->validated();

        //画像変更する場合
        if($request->hasFile('image')) {
            // 変更前の画像削除、新しい画像の登録
            Storage::disk('public')->delete($product->image);
            $updateData['image'] = $request->file('image')->store('fruits-img', 'public');
        }
        $product->update($updateData);
        $product->seasons()->sync($updateData['seasons']);

        return redirect('/products');
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
