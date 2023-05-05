<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id','desc')->paginate(10);
        return view('admin.category.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
 
    public function store(CategoryFormRequest $request){
        $validateData = $request->validated();

        $slug_request = Str::slug($validateData['name']);
        $code = random_int(1000,9999);
        $slug = $code.''.$slug_request;

        $category = new Category;
        $category->slug = $slug;
        $category->name = $validateData['name'];

        $category->save();
        return redirect('admin/categories')->with('message','Berhasil Menambahkan Category');
    }

    public function edit(Category $category){
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request,$category){
        $validateData = $request->validated();

        $category = Category::findOrFail($category);
        $category->name = $validateData['name'];

        $category->update();
        return redirect('admin/categories')->with('message','Berhasil Update Category');
    }

    public function destroy(int $category_id){
        $category = Category::findOrFail($category_id);
        $category->delete();

        return redirect()->back()->with('message','Berhasil Hapus Category');
    }


}
