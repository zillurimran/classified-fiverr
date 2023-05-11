<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdComment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getReplies()
    {
        return $this->hasMany(AdReply::class, 'comment_id', 'id');
    }
}
