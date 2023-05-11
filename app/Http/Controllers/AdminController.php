<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\{User,AdPost,StripeKey,GueatMessage,ThemeSetting};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $total_items = [];
        $monthly_users = [];
        $total_users = User::count();

        for ($i=1; $i <=12 ; $i++) {
            $total_items []  = AdPost::whereYear('created_at', date('Y'))->whereMonth('created_at', $i)->count();
            $monthly_users [] = User::whereYear('created_at', date('Y'))->whereMonth('created_at', $i)->count();
        }
        
        return view('admin.index', compact('total_users', 'total_items', 'monthly_users'));
    }

    public function adminProfile()
    {
        return view('admin.profile.index');
    }

    public function updateAdminInfo(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::find($id);
        $user->update($request->except('_token','_method') + [
            'name' => $request->name,
            'email' => $request->email,
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

    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        $password = User::find($id)->update(['password'=> Hash::make($request->new_password)]);

        if($password){
            return back()->with('success', 'Password Updated Success !');
        }else{
            return back()->with('error', 'Something Wrong !');
        }

    }

    public function guestMessages()
    {
        return view('admin.guest.index', [
            'messages' => GueatMessage::all(),
        ]);
    }

    public function guestMessagesDestroy($id)
    {
        $message = GueatMessage::find($id)->delete();

        if($message){
            return back()->with('error', 'Message Delete Success !');
        }else{
            return back()->with('danger', 'Something Wrong !');
        }
    }

    public function stripeKey()
    {
        return view('admin.stripe.index', [
            'stripeKey' => StripeKey::first(),
        ]);
    }

    public static function stripeKeyUpdate(Request $request, $id)
    {
        $stripe = StripeKey::find($id)->update($request->except('_token', '_method') + [
            'key' => $request->key,
            'secret' => $request->secret,
        ]);

        if($stripe){
            return back()->with('success', 'Stripe key updated Success !');
        }else{
            return back()->with('danger', 'Something Wrong !');
        }
    }

    public function darkModeSetup()
    {
        $theme = ThemeSetting::where('user_id', Auth::user()->id)->first()->theme;
        $nav = ThemeSetting::where('user_id',Auth::user()->id)->first()->nav;

        if($theme == 'light-layout' && $nav == 'expended'){
            ThemeSetting::where('user_id', Auth::user()->id)->update([
                'theme' => 'dark-layout',
                'nav' => 'collapsed',
            ]);
        }elseif($theme == 'dark-layout' && $nav == 'collapsed'){
            ThemeSetting::where('user_id', Auth::user()->id)->update([
                'theme' => 'light-layout',
                'nav' => 'expended',
            ]);
        }else{
            return back();
        }
        return response()->json('Success');
    }

}
