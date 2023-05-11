<?php

namespace App\Http\Controllers;

use App\Models\AdImage;
use App\Models\Keyword;
use App\Models\LocalService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LocalServiceController extends Controller
{
    public function postAd(Request $request)
    {
        $request->validate([
            'title'         => 'required',
            'city_location' => 'string',
            'sub_category'  => 'required',
            'contactName'   => 'required',
            'contactTelNo'  => 'required'
        ]);

        $post =  LocalService::create([
            'title'         => $request->title,
            'city_location' => $request->city_location,
            'sub_category'  => $request->sub_category,
            'description'   => $request->description,
            'company_name'  => $request->company_name,
            'address'       => $request->address,
            'name'          => $request->name,
            'telNo'         => $request->telNo,
            'altTelNo'      => $request->altTelNo,
            'email'         => $request->email,
            'website'       => $request->website,
            'contactName'   => $request->contactName,
            'contactTelNo'  => $request->contactTelNo,
            'contactEmail'  => $request->contactEmail,
        ]);
        if($request->keywords && $request->category_id){
            foreach($request->keywords as $keyword){
               $keys = explode(',', $keyword);
               foreach($keys as $key){
                Keyword::create([
                    'ad_id'         => $post->id,
                    'keyword'       => $key,
                    'category_id'   => $request->category_id
                ]);
               }
            }
        }

        if($request->file('images') && $request->category_id){
            foreach($request->file('images') as $image){
              $fileName = uniqid().'-'.rand().'.'.$image->extension();
              $location = public_path('uploads/adImages');
              $image->move($location, $fileName);
              AdImage::create([
                 'ad_id'        => $post->id,
                 'ad_images'    => $fileName,
                 'category_id'  => $request->category_id
              ]);
            }
        }

        if(!$post)
        {
            return back()->withErrors('Something Wrong !');
        }else{
            return redirect()->route('ad.categories', 3)->with('success', 'Your Post Created Successfully !');
        }
    }
}
