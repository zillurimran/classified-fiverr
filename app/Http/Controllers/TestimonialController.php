<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required'
        ]);

        $testimonial = Testimonial::create($request->except('_token','_method') + [
            'name' => $request->name,
            'description' => $request->description,
            'star' => $request->star,
        ]);

        if($request->hasFile('image')){
            $testimonial_photo       = $request->file('image');
            $fileName         = uniqid() . "." . $testimonial_photo->extension();
            $location         = public_path('uploads/testimonials');
            $testimonial->image      = $fileName;

            $testimonial_photo->move($location, $fileName);
            $testimonial->save();
        }

        return redirect()->route('testimonials.index')->withSuccess('Testimonial Created Success !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        $testimonial = Testimonial::find($testimonial)->first();
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        // dd($testimonial->id);
        $request->validate([
            'description' => 'required'
        ]);
        $testimonial = Testimonial::find($testimonial->id);
        $testimonial->update($request->except('_token','_method') + [
            'name' => $request->name,
            'description' => $request->description,
            'star' => $request->star,
        ]);
        if($request->hasFile('image')){
            $testimonial_photo       = $request->file('image');
            $fileName         = uniqid() . "." . $testimonial_photo->extension();
            // dd($fileName);
            $location         = public_path('uploads/testimonials');
            $testimonial->image      = $fileName;

            $testimonial_photo->move($location, $fileName);
            $testimonial->save();
        }

        return redirect()->route('testimonials.index')->withSuccess('Testimonial Created Success !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $del = Testimonial::where('id', $testimonial->id)->delete();
        if(!$del){
            return back()->with('error', 'Something Went Wrong !');
        }else{
            return redirect()->back()->with('success', 'Testimonial Delete Success !');
        }
    }
}
