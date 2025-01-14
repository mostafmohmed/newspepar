<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite_News extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function news(){
        return  $this->belongsTo(News::class,'news_id');
    }
}
