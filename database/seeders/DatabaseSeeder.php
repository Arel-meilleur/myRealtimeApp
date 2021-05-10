<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Category;
use App\Models\Question;
use App\Models\Replay;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Question::factory(10)->create();
        \App\Models\Replay::factory(10)->create();
        \App\Models\Like::factory(10)->create();

        // factory(User::class, 10)->create();
        // factory(Category::class, 5)->create();
        // factory(Question::class, 10)->create();
        // factory(Replay::class, 50)->create()->each(function($reply){
        //     return $reply->like()->save(factory(Like::class)->make());
        // });
    }
}
