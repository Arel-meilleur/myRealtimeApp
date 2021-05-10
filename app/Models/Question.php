<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Replay;
use App\Models\Category;

class Question extends Model
{
    public function getRouteKeyName(){

        return 'slug';
    }

    // protected $filable = ['title','slug','body','category_id','user_id'];
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function replay(){
        return $this->hasMany(Replay::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getPathAttribute(){

        return asset("api/question/$this->slug");
    }

    use HasFactory;

}
