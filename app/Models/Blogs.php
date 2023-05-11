<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogCategory;
use App\Models\User;

class Blogs extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function relationToBlogCategory(){
        return $this->hasOne(BlogCategory::class, 'id', 'category_id');
    }

    public function relationToUser(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'blog_tags', 'blog_id','tag_id');
    }
}
