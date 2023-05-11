<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{BuySellTrade, Keyword, AdImage};

class BuySellTradeController extends Controller
{
    public function postAd(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'city' => 'required',
            'description' => 'required',
            'contactName' => 'required',
            'contactTelNo' => 'required',
        ]);

        $post = BuySellTrade::create([
            'title' => $request->title,
            'category' => $request->category,
            'sub_category' => $request->sub_category ?? '',
            'price' => $request->price,
            'city' => $request->city,
            'description' => $request->description,
            'address' => $request->address,
            'userName' => $request->userName,
            'telNo' => $request->telNo,
            'altTelNo' => $request->altTelNo,
            'email' => $request->email,
            'website' => $request->website,
            'contactName' => $request->contactName,
            'contactTelNo' => $request->contactTelNo,
            'contactEmail' => $request->contactEmail,
        ]);

        if($request->keywords){
            foreach($request->keywords as $keyword){
               $keys = explode(',', $keyword);
               foreach($keys as $key){
                Keyword::create([
                    'ad_id'     => $post->id,
                    'keyword' => $key,
                    'category_id' => $request->category_id
                ]);
               }
            }
        }

        if($request->file('images')){
            foreach($request->file('images') as $image){
              $fileName = uniqid().'-'.rand().'.'.$image->extension();
              $location = public_path('uploads/adImages');
              $image->move($location, $fileName);
              AdImage::create([
                 'ad_id'     => $post->id,
                 'ad_images' => $fileName,
                 'category_id' => $request->category_id
              ]);
            }
        }

        if(!$post)
        {
            return back()->withErrors('Something Wrong !');
        }else{
            return redirect()->route('ad.categories', 5)->with('success', 'Your Post Created Successfully !');
        }
    }
}
