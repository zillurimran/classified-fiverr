<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AdPost extends Model
{
    use HasFactory;
    Protected $guarded = ['id'];

    public function getAdImages()
    {
        return $this->hasMany(AdImage::class, 'ad_id', 'id');
    }

    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getPackage()
    {
        return $this->belongsTo(Package::class,'package_id','id');
    }

    public function getUser()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function getCountry()
    {
        return $this->belongsTo(Country::class,'country_id', 'id');
    }

    public function getKeywords()
    {
        return $this->hasMany(Keyword::class,'ad_id','id');
    }

    public function getComments()
    {
         return $this->hasMany(AdComment::class,'ad_id','id');
    }

    public function getFeaturedPackage()
    {
        return $this->belongsTo(FeaturePackage::class,'featured_id', 'id');
    }
}
