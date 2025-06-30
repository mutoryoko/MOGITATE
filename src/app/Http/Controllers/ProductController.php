<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Season;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->sort;

        if ($sort === 'asc') {
            $products = Product::orderBy('price', 'asc')->paginate(6);
        } elseif ($sort === 'desc') {
            $products = Product::orderBy('price', 'desc')->paginate(6);
        } else {
            $products = Product::paginate(6)->withQueryString();
        }

        return view('index', compact('products', 'sort'));
    }

    public function register()
    {
        $seasons = Season::all();

        return view('register', compact('seasons'));
    }

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

    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        $seasons = Season::all();

        return view('edit', compact('product', 'seasons'));
    }

    public function update(ProductFormRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $updateData = $request->validated();

        if($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $updateData['image'] = $request->file('image')->store('fruits-img', 'public');
        }
        $product->update($updateData);
        $product->seasons()->sync($updateData['seasons']);

        return redirect('/products');
    }

    public function destroy(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        Product::find($request->id)->delete();
        Storage::disk('public')->delete($product->image);

        return redirect('/products');
    }
}
