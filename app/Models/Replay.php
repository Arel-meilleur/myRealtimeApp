<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Question;
use App\Models\Like;

class Replay extends Model
{
    protected $guarded = [];

    protected static function boot(){
        parent::boot();

        static::creating(function($reply){

            $reply->user_id = auth()->id();
        });

    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function like(){
        return $this->hasMany(Like::class);
    }
    use HasFactory;
}
