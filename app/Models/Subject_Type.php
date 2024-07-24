<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject_Type extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function news(){
        return $this->belongsTo(News_Type::class,'news_id');
        //belongsTo(,)
    }
}
