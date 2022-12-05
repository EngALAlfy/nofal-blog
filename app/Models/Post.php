<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'image',
        'content',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    function comments(){
        return $this->hasMany(Comment::class);
    }

    public function getImageAttribute($value)
    {
        if(!\Str::startsWith($value , "http")){
            $value = url("/storage/photos/posts") . "/" . $value;
        }

        return $value;
    }

    public function getCreatedAtAttribute($value)
    {
        return  Carbon::createFromTimeString($value)->diffForHumans();
    }
}
