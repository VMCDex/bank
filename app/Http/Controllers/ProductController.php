<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.product-detail', compact('product'));
    }

    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('type') && $request->type) {
            $query->where('type', $request->type);
        }

        $products = $query->paginate(10);
        $productTypes = Product::select('type')->distinct()->pluck('type');

        return view('admin.products.index', compact('products', 'productTypes'));
    }

    // Форма добавления продукта
    public function create()
    {
        return view('admin.products.create');
    }

    // Сохранение продукта
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only(['type', 'name', 'short_description', 'full_description']);

        // Обработка загрузки изображения
        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '_' . $image->getClientOriginalName();
        $path = 'images/' . $filename;

        $image->move(public_path('images'), $filename);
        $data['image_path'] = $path;
        }

        Product::create($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Продукт успешно добавлен!');
    }

    // Форма редактирования
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // Обновить продукт
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:Кредиты,Карты,Вклады',
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'delete_image' => 'sometimes|boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $product = Product::findOrFail($id);
        $data = $request->only(['type', 'name', 'short_description', 'full_description']);

        // Обработка удаления изображения
        if ($request->has('delete_image')) {
            if ($product->image_path && file_exists(public_path($product->image_path))) {
                unlink(public_path($product->image_path));
            }
            $data['image_path'] = null;
        }

        // Обработка нового изображения
        if ($request->hasFile('image')) {
            // Удаляем старое изображение, если оно есть
            if ($product->image_path && file_exists(public_path($product->image_path))) {
                unlink(public_path($product->image_path));
            }

            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = 'images/' . $filename;

            $image->move(public_path('images'), $filename);
            $data['image_path'] = $path;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Продукт успешно обновлён!');
    }

    // Удалить продукт
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Удаляем изображение, если оно есть
        if ($product->image_path && file_exists(public_path($product->image_path))) {
            unlink(public_path($product->image_path));
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Продукт успешно удалён!');
    }

}
