<?php

namespace App\Http\Controllers;

use App\Models\AdBenefit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdBenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adBenefits = AdBenefit::all();
        return view('admin.ad.benefit.index', compact('adBenefits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $benefits = AdBenefit::create($request->all());

        if($benefits){
            return back()->with('success', 'Benefits Created Success !');
        }else{
            return back()->with('error', 'Something Wrong !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AdBenefit $adBenefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdBenefit $adBenefit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $adBenefits = AdBenefit::find($id)->update($request->except('_token', '_method') + [
            'name' => $request->name,
        ]);

        if($adBenefits){
            return back()->with('success', 'Benefits Updated Success !');
        }else{
            return back()->with('error', 'Something Wrong !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = AdBenefit::find($id)->delete();

        if($delete){
            return back()->with('warning', 'Terms Deleted Success !');
        }else{
            return back()->with('error', 'Something Wrong !');
        }
    }
}
