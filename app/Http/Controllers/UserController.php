<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AdPost;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $ads = AdPost::where('user_id', Auth::id())->get();
        $paidAds = AdPost::where([['user_id','=', Auth::id()],['status','=','1']])->get();
        $featuredAds = AdPost::where([['user_id','=', Auth::id()],['featured_id','=','1']])->get();
        $publishAds = AdPost::where('user_id', Auth::user()->id)->get();
        $countries = Country::all();
        return view('frontend.pages.user.index', compact('ads', 'paidAds', 'featuredAds', 'publishAds', 'countries'));
    }

    public function updateUserProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $user = User::find($id);
        $user->update($request->except('_token','_method') + [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'biography' => $request->biography,
        ]);

        if($request->hasFile('profile_photo_path')){
            $user_photo       = $request->file('profile_photo_path');
            $fileName         = $request->name . uniqid() . "." . $user_photo->extension();
            $location         = public_path('uploads/profile');
            $user_photo->move($location, $fileName);
            $user->profile_photo_path = $fileName;
            $user->save();
        }

        if($user){
            return back()->with('success', 'Profile Updated Success !');
        }else{
            return back()->with('error', 'Something Wrong !');
        }

    }

    public function updateUserPassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        $password = User::find($id)->update(['password'=> Hash::make($request->new_password)]);

        if($password){
            return back()->with('success', 'Completed !');
        }else{
            return back()->with('error', 'Something Wrong !');
        }
    }

    public function deleteAd($id)
    {
        $delete = AdPost::find($id)->delete();
        if($delete){
            return back()->with('danger', 'Ad Deleted Success !');
        }
    }
}
