<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Replay;
use App\Models\Category;

class Question extends Model
{
    // cette fonction permet de passer le slug lors de la crétion d'une question , pour ne pas surcharger le controller

    protected static function boot(){

        parent::boot();

        static::creating(function ($question) {
            $question['slug'] = Str::slug($question->title);
        });
    }

    public function getRouteKeyName(){

        return 'slug';
    }

    protected $fillable = ['title','slug','body','category_id','user_id'];
    // protected $guarded = [];

    // uitiliser pour assoocier les reponses a une question
    protected $with = ['replay'];


    public function user(){
        return $this->belongsTo(User::class);
    }
    

    public function replay(){
        return $this->hasMany(Replay::class)->latest();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getPathAttribute(){

        // return asset("api/question/$this->slug");
        return "/question/$this->slug";   // Pour éviter que le base url se trouvre dans la barre lorsqu'on retourne le path
    }

    use HasFactory;

}
