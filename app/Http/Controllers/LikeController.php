<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\Replay;

class LikeController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT');
    }

    public function likeIt(Replay $replay){
        $replay->like()->create([
            // 'user_id' =>auth()->id()
            'user_id' => 1
        ]);
    }
    public function unlikeIt(Replay $replay){
        // $replay->like()->where(['user_id', auth()->id()])->first()->delete();
        $replay->like()->where('user_id', '1')->first()->delete();
    }
}

