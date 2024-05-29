<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request){
        $keyword = $request->input('keyword');
        $service = Service::query();

        if (!empty($keyword)) {
            $service->where('title', 'like', "%$keyword%");
        }
        $serviceData = $service->paginate(5);

        return view('service.index',compact('serviceData'));
    }

    public function create(){
        return view('service.create');
    }

    public function store(ServiceRequest $request){
//        dd($request);
        $service=Service::create($request->all());
        $image = $request->file('image')->store('public/service');

        $service->image = str_replace('public/', '', $image);
        $service->save();
        return redirect()->route('service.index')->with('success', 'Service  created successfully.');
    }

    public function edit(Service $service){

        return view('service.edit',compact('service'));
    }

    public function update(Service $service , ServiceRequest $request){
        $serviceData = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/service');
            $serviceData['image'] = str_replace('public/', '', $imagePath);
        }

        $service->update($serviceData);

        return redirect()->route('service.index')->with('success', 'service item successfully updated');
    }


    public function delete(Service $service){
        $service->delete();
        return redirect()->route('service.index')->with('error','Successfully  service items deleted');

    }
    public function duplicate(Service $service){
        $productDuplicate=$service->replicate();
        $productDuplicate->save();
        return redirect()->back();
    }
}
