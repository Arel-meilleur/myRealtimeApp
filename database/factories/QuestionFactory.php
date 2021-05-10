<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;



use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        return [
            'title' =>$title,
            'slug' =>$title,
            'body' =>$this->faker->text,
            'category_id' => Category::factory(),
            'user_id' => User::factory()


        ];
    }
}
