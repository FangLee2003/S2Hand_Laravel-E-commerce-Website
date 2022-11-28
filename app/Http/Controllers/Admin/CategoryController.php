<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function getAdd()
    {
        return view('admin.category.add');
    }

    public function postAdd(Request $request)
    {
        try {
            $category = new Category();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('assets/uploads/category/', $filename);

                $category->image = $filename;
            }

            $category->name = $request->input('name');
            $category->slug = $request->input('slug');
            $category->description = $request->input('description');
            $category->status = $request->input('status') == TRUE ? '1' : '0';
            $category->trending = $request->input('trending') == TRUE ? '1' : '0';
            $category->meta_title = $request->input('meta_title');
            $category->meta_descrip = $request->input('meta_descrip');
            $category->meta_keywords = $request->input('meta_keywords');

            $category->save();

            return redirect('admin/categories')->with('success', 'Category Added Successfully');
        } catch (Exception $e) {
            return back()->with('warning', 'Missing information');
        }
    }

    public function getEdit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function putEdit(Request $request, $id)
    {
        try {
            $category = Category::find($id);

            if ($request->hasFile('image')) {
                $path = 'assets/uploads/category/' . $category->image;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('assets/uploads/category/', $filename);

                $category->image = $filename;
            }

            $category->name = $request->input('name');
            $category->slug = $request->input('slug');
            $category->description = $request->input('description');
            $category->status = $request->input('status') == TRUE ? '1' : '0';
            $category->trending = $request->input('trending') == TRUE ? '1' : '0';
            $category->meta_title = $request->input('meta_title');
            $category->meta_descrip = $request->input('meta_descrip');
            $category->meta_keywords = $request->input('meta_keywords');

            $category->update();

            return redirect('admin/categories')->with('success', 'Category Edited Successfully');
        } catch (Exception $e) {
            return back()->with('warning', 'Missing information');
        }
    }

    public function delete($id)
    {
        $category = Category::find($id);

        if ($category->image) {
            $path = 'assets/uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $category->delete();

        return back()->with('success', 'Category Deleted Successfully');
    }
}
