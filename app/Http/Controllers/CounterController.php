<?php

namespace App\Http\Controllers;

use App\Http\Requests\CounterRequest;
use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function index(Request $request){
        $keyword = $request->input('keyword');
        $counter = Counter::query();

        if (!empty($keyword)) {
            $counter->where('title', 'like', "%$keyword%");
        }
        $counterData = $counter->paginate(5);

        return view('counter.index',compact('counterData'));
    }

    public function create(){
        return view('counter.create');
    }

    public function store(CounterRequest $request){
//        dd($request);
        $counter=Counter::create($request->all());
//        $image = $request->file('image')->store('public/counter');
//
//        $counter->image = str_replace('public/', '', $image);
//        $counter->save();
        return redirect()->route('counter.index')->with('success', 'Counter  created successfully.');
    }

    public function edit(Counter $counter){

        return view('counter.edit',compact('counter'));
    }

    public function update(Counter $counter , CounterRequest $request){
        $counterData = $request->all();
//
//        if ($request->hasFile('image')) {
//            $imagePath = $request->file('image')->store('public/counter');
//            $counterData['image'] = str_replace('public/', '', $imagePath);
//        }

        $counter->update($counterData);

        return redirect()->route('counter.index')->with('success', 'counter item successfully updated');
    }


    public function delete(Counter $counter){
        $counter->delete();
        return redirect()->route('counter.index')->with('error','Successfully  counter items deleted');

    }
    public function duplicate(Counter $counter){
        $productDuplicate=$counter->replicate();
        $productDuplicate->save();
        return redirect()->back();
    }
}
