<?php

namespace App\Http\Controllers;

use App\Http\Requests\HeroRequest;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index(Request $request){
        $keyword = $request->input('keyword');
        $hero = Hero::query();

        if (!empty($keyword)) {
            $hero->where('title', 'like', "%$keyword%");
        }
        $heroData = $hero->paginate(5);

        return view('hero.index',compact('heroData'));
    }

    public function create(){
        return view('hero.create');
    }

    public function store(HeroRequest $request){
//        dd($request);
        $hero=Hero::create($request->all());
        $image = $request->file('image')->store('public/hero');

        $hero->image = str_replace('public/', '', $image);
        $hero->save();
        return redirect()->route('hero.index')->with('success', 'Hero  created successfully.');
    }

    public function edit(Hero $hero){

        return view('hero.edit',compact('hero'));
    }

    public function update(Hero $hero , HeroRequest $request){
        $heroData = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/hero');
            $heroData['image'] = str_replace('public/', '', $imagePath);
        }

        $hero->update($heroData);

        return redirect()->route('hero.index')->with('success', 'hero item successfully updated');
    }


    public function delete(Hero $hero){
        $hero->delete();
        return redirect()->route('hero.index')->with('error','Successfully  hero items deleted');

    }
    public function duplicate(Hero $hero){
        $productDuplicate=$hero->replicate();
        $productDuplicate->save();
        return redirect()->back();
    }
}
