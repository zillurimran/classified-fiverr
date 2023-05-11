<?php

namespace App\Http\Controllers;

use App\Models\AdPost;
use App\Models\Category;
use App\Models\Keyword;
use Illuminate\Http\Request;

class SearchController extends Controller
{   
    public function categorySearch(Request $request){
        
        $categories = Category::all();
        $country = $request->country_id ?? '';
        $categoryDetail = Category::find($request->category_id);
        if($request->country_id){
            $search_results = AdPost::where('country_id', $request->country_id)
            ->where('ad_title', 'LIKE', '%'.$request->search_string.'%')
            ->latest()
            ->paginate(6);
            return view('frontend.pages.search-result',compact('search_results', 'categories', 'categoryDetail', 'country'));
        }else{
            $search_results = AdPost::where('ad_title', 'LIKE', '%'.$request->search_string.'%')
            ->latest()
            ->paginate(6);
            return view('frontend.pages.search-result',compact('search_results', 'categories', 'country', 'categoryDetail'));
        }
       
        // if($request->category_id){
           
        // }else{
        //     $search_results = AdPost::where('ad_title', 'LIKE', '%'.$request->search_string.'%')
        //     ->latest()
        //     ->get();
        //     return view('frontend.pages.search-result',compact('search_results', 'categories'));
        // }
        
    }

    public function keywordSearch($id){
        $categories = Category::all();
        $keyWordName = Keyword::find($id)->keyword;
        $postIds = Keyword::where('keyword', $keyWordName)->pluck('ad_id');
        $search_results = AdPost::whereIn('id', $postIds)->paginate(6);
        return view('frontend.pages.search-result',compact('search_results', 'categories'));
        
    }
       
    
}
