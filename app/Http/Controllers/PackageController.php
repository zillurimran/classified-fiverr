<?php

namespace App\Http\Controllers;

use App\Models\FeaturePackage;
use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Carbon;

class PackageController extends Controller
{
    public function index(){
        return view('admin.packages.index',['packages' => Package::latest()->get()]);
    }

    public function create(){
        return view('admin.packages.create');
    }

    public function store(Request $request){
        $request->validate([
            'days' => 'required|numeric',
            'package_price' => 'required|numeric'
        ]);
        $package = Package::create($request->except('_token')+['created_at'=>Carbon::now()]);
        if($package){
            return to_route('package.index')->with('success', 'Your Package is created !');
        }else{
            return back()->with('error', 'Something Wrong !');
        }

    }

    public function update(Request $request, $id){
        $update = Package::find($id)->update($request->all());
        if($update){
            return to_route('package.index')->with('success', 'Your Package is Updated !');
        }else{
            return back()->with('error', 'Something Wrong !');
        }
    }

    public function delete($id){
        $package = Package::find($id);
        $delete = $package->delete();
        if($delete){
            return to_route('package.index')->with('success', 'Your Package is Deleted !');
        }else{
            return back()->with('error', 'Something Wrong !');
        }
    }

    public function featuredIndex(){
        return view('admin.packages.feature-index',['packages' => FeaturePackage::latest()->get()]);
    }


    public function featuredCreate(){
        return view('admin.packages.create-feature');
    }

    public function featuredStore(Request $request){
        $request->validate([
            'featured_days' => 'required|numeric|unique:feature_packages,featured_days',
            'featured_price' => 'required|numeric'
        ]);
        $featuredPackage = FeaturePackage::create($request->except('_token')+['created_at'=>Carbon::now()]);
        return redirect()->route('featured.package.index')->withSuccess('Featured Package created successfully');
    }

    public function featureUpdate(Request $request, $id){
        $package = FeaturePackage::find($id);
        $package->update($request->all());
        return back()->withSuccess('Package updated successfully');
    }

    public function featureDelete(Request $request, $id){
        $package = FeaturePackage::find($id);
        $package->delete();
        return back()->withSuccess('Package deleted');
    }
}
