<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index',['categories'=> Category::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->except('_token')+['created_at' => Carbon::now()]);
        if($request->file('image')){
            $image = $request->file('image');
            $filename = $category->id.'-'.time().'.'.$image->getClientOriginalExtension();
            $location = public_path('uploads/categories/');
            $image->move($location,$filename);
            $category->image = $filename;
        }
        if($request->file('bg_image')){
            $bgImage = $request->file('bg_image');
            $filename = $category->id.'-'.time().'.'.$bgImage->getClientOriginalExtension();
            $location = public_path('uploads/categories/');
            $bgImage->move($location,$filename);
            $category->bg_image = $filename;
        }
        $category->created_by = Auth::user()->name;
        $category->save();
        return to_route('categories.index')->withSuccess('Category saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        $category->update($request->except('_token','image')+['updated_at' => Carbon::now()]);

        if($request->file('image')){
        $image = $request->file('image');
        $filename = $category->id.'-'.time().'.'.$image->getClientOriginalExtension();
        $location = public_path('uploads/categories/');
        $image->move($location,$filename);
        $category->image = $filename;
        
        }
        if($request->file('bg_image')){
            $bgImage = $request->file('bg_image');
            $filename = $category->id.'-'.time().'.'.$bgImage->getClientOriginalExtension();
            $location = public_path('uploads/categories/');
            $bgImage->move($location,$filename);
            $category->bg_image = $filename;  
        }
        $category->save();
        return back()->withSuccess('Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->withSuccess('Category Deleted');
    }

    public function deleteMultipleCategories(Request $request){
        return response()->json([
            'data' => $request,
        ]);
    }
}
