<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.tag.index', [
            'tags' => Tag::all(),
        ]);
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
        $request->validate(['name' => 'required']);
        $tag = Tag::create($request->all());
        if($tag){
            return back()->with('success', 'Tag Created Success !');
        }else{
            return back()->with('error', 'Something Wrong !');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate(['name' => 'required']);
        $tag = $tag->update($request->all());

        if($tag){
            return back()->with('success', 'Tag Updated Success !');
        }else{
            return back()->with('error', 'Something Wrong !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag = $tag->delete();

        if($tag){
            return back()->with('warning', 'Tag Deleted Success !');
        }else{
            return back()->with('error', 'Something Wrong !');
        }
    }
}
