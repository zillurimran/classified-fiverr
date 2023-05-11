<?php
//getCategories

use App\Models\AdPost;

function getCategories()
{
    return \App\Models\Category::all();
}

//  General Settings
function generalSettings()
{
    return \App\Models\GeneralSetting::first();
}

//  Title Settings
function titleSettings()
{
    return \App\Models\Title::first();
}

//getCategoryWisePostCOunt
function getPostCount($category_id)
{
    return \App\Models\AdPost::where('category_id', $category_id )->where('status', 1)->where('expiry_date', '>=', \Carbon\Carbon::now())->count();
}

//getRelatedPostImage
function getRelatedImage($ad_id)
{
    return \App\Models\AdImage::where('ad_id', $ad_id)->first()->ad_images;
}

//countCountryWisePost
function countCountryWisePost($country_id)
{
    return \App\Models\AdPost::where('country_id', $country_id)->where('status', 1)->where('expiry_date', '>=', \Carbon\Carbon::now())->count();
}

//adCount
function adCount()
{
    return \App\Models\AdPost::where('status', 1)->where('expiry_date', '>=', \Carbon\Carbon::now())->count();
}