<?php

namespace App\Http\Controllers;

use App\Models\AdTerms;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdTermsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adTerms = AdTerms::all();
        return view('admin.ad.term.index', compact('adTerms'));
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

        $terms = AdTerms::create($request->all());
        if($terms){
            return back()->with('success', 'Terms Created Success !');
        }else{
            return back()->with('error', 'Something Wrong !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AdTerms $adTerms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdTerms $adTerms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdTerms $adTerms, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $adTerms = AdTerms::find($id)->update($request->except('_token', '_method') + [
                'name' => $request->name,
            ]);

        if($adTerms){
            return back()->with('success', 'Terms Updated Success !');
        }else{
            return back()->with('error', 'Something Wrong !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdTerms $adTerms, $id)
    {

        $delete = AdTerms::find($id)->delete();

        if($delete){
            return back()->with('warning', 'Terms Deleted Success !');
        }else{
            return back()->with('error', 'Something Wrong !');
        }

    }
}
