<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request){
        $menus = Menu::with('category')->get();
        $keyword = $request->input('keyword');
        $menu = Menu::query();

        if (!empty($keyword)) {
            $menu->where('title', 'like', "%$keyword%");
        }
        $menuData = $menu->paginate(15);

        return view('menus.index',compact('menuData','menus'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('menus.form', compact('categories'));
    }

//    public function store(MenuRequest $request)
//    {
//        $data = $request->validated();
//
//        if ($request->hasFile('image')) {
//            $data['image'] = $request->file('image')->store('images', 'public');
//        }
//
//        Menu::create($data);
//
//        return redirect()->route('menu.index')->with('success', 'Menu created successfully.');
//    }

    public function store(MenuRequest $request){
//        dd($request);
        $menu=Menu::create($request->all());
        $image = $request->file('image')->store('public/menus');

        $menu->image = str_replace('public/', '', $image);
        $menu->save();
        return redirect()->route('menu.index')->with('success', 'Menu  created successfully.');
    }

    public function edit(Menu $menu){
//        $menu = Menu::findOrFail($id);
        $categories = Category::all();
        return view('menus.edit',compact('menu','categories'));
    }

    public function update(Menu $menu , MenuRequest $request){
        $menuData = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/menus');
            $menuData['image'] = str_replace('public/', '', $imagePath);
        }

        $menu->update($menuData);

        return redirect()->route('menu.index')->with('success', 'menus item successfully updated');
    }


    public function delete(Menu $menu){
        $menu->delete();
        return redirect()->route('menu.index')->with('error','Successfully  menus items deleted');

    }
    public function duplicate(Menu $menu){
        $productDuplicate=$menu->replicate();
        $productDuplicate->save();
        return redirect()->back();
    }
}
