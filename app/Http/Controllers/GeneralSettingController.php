<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GeneralSettingRequest;

class GeneralSettingController extends Controller
{

     /**
     * Construct
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('verified');
        // $this->middleware('checkAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.generalSettings.index', [
            'generalSettings' => GeneralSetting::first()
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function update(GeneralSettingRequest $request, GeneralSetting $generalSetting)
    {
         //  Logo
        if($request->hasFile('logo')){

            $logo = $request->file('logo');
            $filename = 'logo.'. $logo->extension('logo');
            $location = public_path('uploads/generalSettings/');
            $logo->move($location, $filename);

            $generalSetting->logo = $filename;

        }

        // dark logo
        if($request->hasFile('logo_dark')){

            $logo = $request->file('logo_dark');
            $filename = 'logo_dark.'. $logo->extension('logo_dark');
            $location = public_path('uploads/generalSettings/');
            $logo->move($location, $filename);

            $generalSetting->logo_dark = $filename;

        }

        //  Favicon
        if($request->hasFile('favicon')){

            $favicon = $request->file('favicon');
            $favicon_filename = 'favicon.'. $favicon->extension('favicon');
            $favicon_location = public_path('uploads/generalSettings/');
            $favicon->move($favicon_location, $favicon_filename);
            $generalSetting->favicon = $favicon_filename;
        }

        $generalSetting->app_title        = $request->app_title;
        $generalSetting->footer_description  = $request->footer_description;
        $generalSetting->site_designer  = $request->site_designer;
        $generalSetting->designer_route  = $request->designer_route;
        $generalSetting->facebook  = $request->facebook;
        $generalSetting->twitter  = $request->twitter;
        $generalSetting->linkedin  = $request->linkedin;
        $generalSetting->whatsapp  = $request->whatsapp;
        $generalSetting->save();

        return back()->withSuccess('Updated Successfully');
    }
}
