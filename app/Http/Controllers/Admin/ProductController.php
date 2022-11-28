<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $product = Product::all();
        return view('admin.product.index', compact('category', 'product'));
    }

    public function getAdd()
    {
        $category = Category::all();
        return view('admin.product.add', compact('category'));
    }

    public function postAdd(Request $request)
    {
        try {
            $product = new Product();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('assets/uploads/product/', $filename);

                $product->image = $filename;
            }
            $product->cate_id = $request->input('cate_id');
            $product->name = $request->input('name');
            $product->slug = $request->input('slug');
            $product->description = $request->input('description');
            $product->original_price = $request->input('original_price');
            $product->selling_price = $request->input('selling_price');
            $product->quantity = $request->input('quantity');
            $product->status = $request->input('status') == TRUE ? '1' : '0';
            $product->trending = $request->input('trending') == TRUE ? '1' : '0';
            $product->meta_title = $request->input('meta_title');
            $product->meta_descrip = $request->input('meta_descrip');
            $product->meta_keywords = $request->input('meta_keywords');

            $product->save();

            return redirect('admin/products')->with('success', 'Product Added Successfully');
        } catch (Exception $e) {
            return back()->with('warning', 'Missing information');
        }
    }

    public function getEdit($id)
    {
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.product.edit', compact('category', 'product'));
    }

    public function putEdit(Request $request, $id)
    {
        try {
            $product = Product::find($id);

            if ($request->hasFile('image')) {
                $path = 'assets/uploads/product/' . $product->image;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('assets/uploads/product/', $filename);

                $product->image = $filename;
            }

            $product->cate_id = $request->input('cate_id');
            $product->name = $request->input('name');
            $product->slug = $request->input('slug');
            $product->description = $request->input('description');
            $product->original_price = $request->input('original_price');
            $product->selling_price = $request->input('selling_price');
            $product->quantity = $request->input('quantity');
            $product->status = $request->input('status') == TRUE ? '1' : '0';
            $product->trending = $request->input('trending') == TRUE ? '1' : '0';
            $product->meta_title = $request->input('meta_title');
            $product->meta_descrip = $request->input('meta_descrip');
            $product->meta_keywords = $request->input('meta_keywords');
            $product->update();

            return redirect('admin/products')->with('success', 'Product Edited Successfully');
        } catch (Exception $e) {
            return back()->with('warning', 'Missing information');
        }
    }

    public function delete($id)
    {
        $product = Product::find($id);

        if ($product->image) {
            $path = 'assets/uploads/product/' . $product->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $product->delete();

        return redirect('admin/products')->with('success', 'Product Deleted Successfully');
    }
}
