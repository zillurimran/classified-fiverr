<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PriceController extends Controller
{   
    public function index(){
        return view('admin.packages.index',['packages' => Package::all()]);
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
        return back();
    }

    public function update(Request $request, $id){
        $package = Package::find($id);
        $package->update($request->all());
        return back();
    }

    public function delete(Request $request){
        
    }
}
