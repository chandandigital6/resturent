<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanCOntroller extends Controller
{
    public function index(Request $request){
        $keyword = $request->input('keyword');
        $plan = Plan::query();

        if (!empty($keyword)) {
            $plan->where('title', 'like', "%$keyword%");
        }
        $planData = $plan->paginate(5);

        return view('plan.index',compact('planData'));
    }

    public function create(){
        return view('plan.create');
    }

    public function store(PlanRequest $request){
//        dd($request);
        $plan=Plan::create($request->all());
        $image = $request->file('image')->store('public/plan');

        $plan->image = str_replace('public/', '', $image);
        $plan->save();
        return redirect()->route('plan.index')->with('success', 'Plan  created successfully.');
    }

    public function edit(Plan $plan){

        return view('plan.edit',compact('plan'));
    }

    public function update(Plan $plan , PlanRequest $request){
        $planData = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/plan');
            $planData['image'] = str_replace('public/', '', $imagePath);
        }

        $plan->update($planData);

        return redirect()->route('plan.index')->with('success', 'plan item successfully updated');
    }


    public function delete(Plan $plan){
        $plan->delete();
        return redirect()->route('plan.index')->with('error','Successfully  plan items deleted');

    }
    public function duplicate(Plan $plan){
        $productDuplicate=$plan->replicate();
        $productDuplicate->save();
        return redirect()->back();
    }
}
