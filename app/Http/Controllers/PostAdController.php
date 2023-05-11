<?php

namespace App\Http\Controllers;

use App\Models\{AdComment,AdPost,Category,Country,Keyword,ReactStatus};
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostAdController extends Controller
{
    public function index($id){
        
        $posts = AdPost::where('category_id', $id)->where('status', 1)->where('expiry_date', '>=', Carbon::now())->latest()->paginate(6);
        $categories = Category::all();
        $countries = Country::all();
        $category = Category::find($id);
        return view('frontend.pages.ad-list',compact('posts', 'categories', 'category', 'countries'));

    }

    public function countryWiseAds($id){
        $posts = AdPost::where('country_id', $id)->where('status', 1)->where('expiry_date', '>=', Carbon::now())->latest()->paginate(6);
        $categories = Category::all();
        
        $country = Country::find($id);
        return view('frontend.pages.country-ad-list',compact('posts', 'categories' , 'country'));

    }

    public function adDetails($id){
    
        $post = AdPost::where('id', $id)->where('status', 1)->first();
        $relatedPosts = AdPost::where('category_id', $post->category_id)->where('status', 1)->where('expiry_date', '>=', Carbon::now())->latest()->get()->skip(1);
        $latestPosts = AdPost::where('status', 1)->where('expiry_date', '>=', Carbon::now())->latest()->get()->skip(1);
        $categories = Category::all();
        $comments = AdComment::where('ad_id', $post->id)->get();
        $post->update([
                            'views' => $post->views + 1
                        ]);  
        return view('frontend.pages.ad-details',compact('post', 'categories', 'relatedPosts', 'comments', 'latestPosts'));
           
    }

    public function updateReact(Request  $request){
       
        $post = AdPost::find($request->post_id);
        $user = ReactStatus::where('ip', $request->ip())->where('ad_id', $post->id)->first();
        
        if(!$user){
           $user = ReactStatus::create([
                'ip' => $request->ip(),
                'status' => 0,
                'ad_id' => $post->id
            ]);
        }

        if($user->status == 0){
            $post->update([
                'reacts' => $post->reacts + 1
            ]);
            $user->update([
                'status' => 1
            ]);
            
        }else{
            $post->update([
                'reacts' => $post->reacts - 1
            ]);
            $user->update([
                'status' => 0
            ]);
        }
        
        return response()->json([
            'data' => $post->reacts,
            'ip'  => $user->ip
        ]);
    }


    public function userWiseAd($id){
        $posts = AdPost::where('user_id', $id)->where('status', 1)->where('expiry_date', '>=', Carbon::now())->latest()->paginate(6);
        // 
        $categories = Category::all();
        return view('frontend.pages.users-ad-list',compact('posts', 'categories',));
    }

}
