<?php

namespace App\Http\Controllers;

use App\Models\AdTips;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdTipsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adTips = AdTips::all();
        return view('admin.ad.tip.index', compact('adTips'));
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
        
        $adTips = AdTips::create($request->all());

        if($adTips){
            return back()->with('success', 'Tips Created Success !');
        }else{
            return back()->with('error', 'Something Wrong !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AdTips $adTips)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdTips $adTips)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdTips $adTips, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $adTip = AdTips::find($id)->update($request->except('_token', '_method') + [
            'name' => $request->name,
        ]);

        if($adTip){
            return back()->with('success', 'Tips Updated Success !');
        }else{
            return back()->with('error', 'Something Wrong !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdTips $adTips, $id)
    {
        $delete = AdTips::find($id)->delete();

        if($delete){
            return back()->with('warning', 'Tips Deleted Success !');
        }else{
            return back()->with('error', 'Something Wrong !');
        }
    }
}
