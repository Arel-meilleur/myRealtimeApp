<?php

namespace Database\Factories;


use App\Models\Replay;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Question;

class ReplayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Replay::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body'=> $this->faker->text,
            'question_id' => Question::factory(),

            'user_id' => User::factory()
        ];
    }
}
