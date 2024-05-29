<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        $keyword = $request->input('keyword');
        $category = Category::query();

        if (!empty($keyword)) {
            $category->where('title', 'like', "%$keyword%");
        }
        $categoryData = $category->paginate(5);

        return view('menuCategory.index',compact('categoryData'));
    }

    public function create(){
        return view('menuCategory.create');
    }

    public function store(CategoryRequest $request){
//        dd($request);
        $category=Category::create($request->all());
//        $image = $request->file('image')->store('public/menuCategory');
//
//        $category->image = str_replace('public/', '', $image);
//        $category->save();
        return redirect()->route('category.index')->with('success', 'Category  created successfully.');
    }

    public function edit(Category $category){

        return view('menuCategory.edit',compact('category'));
    }

    public function update(Category $category , CategoryRequest $request){
        $categoryData = $request->all();
//
//        if ($request->hasFile('image')) {
//            $imagePath = $request->file('image')->store('public/menuCategory');
//            $categoryData['image'] = str_replace('public/', '', $imagePath);
//        }

        $category->update($categoryData);

        return redirect()->route('category.index')->with('success', 'menuCategory item successfully updated');
    }


    public function delete(Category $category){
        $category->delete();
        return redirect()->route('category.index')->with('error','Successfully  menuCategory items deleted');

    }
    public function duplicate(Category $category){
        $productDuplicate=$category->replicate();
        $productDuplicate->save();
        return redirect()->back();
    }
}
