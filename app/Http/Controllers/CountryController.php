<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use PHPUnit\Framework\Constraint\Count;

class CountryController extends Controller
{
    public function index(){
        return view('admin.country.index',['countries'=>Country::latest()->get()]);
    }

    public function store(Request $request){
       $request->validate([
        'country_name' => 'required|unique:countries,country_name',
        'bg_image'     => 'required'
       ]);
       
       $country = Country::create([
        'country_name' => $request->country_name,
       ]);
       
       $image = $request->file('bg_image');
       $filename = $country->id.'-'.time().'.'.$image->extension();
       $location = public_path('uploads/locations/');
       $image->move($location,$filename);
       $country->bg_image = $filename;
       $country->save();

       return back()->withSuccess('Country added');
    }

    public function delete(Request $request, $id){
        Country::find($id)->delete();
        return back()->withSuccess('Deleted');
    }
}
