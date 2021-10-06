<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $post = \App\Models\Post::get()->random();
        $video = \App\Models\Video::get()->random();
        
        $collection = collect([$post,$video]);
        $random_obj = $collection->random();
        return [
           'comment' => $this->faker->paragraph(),
           'comment_table_type'=>get_class($random_obj),
           'comment_table_id'=>$random_obj->id,
        ];
    }
}
