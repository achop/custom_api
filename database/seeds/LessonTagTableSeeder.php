<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.04.2017
 * Time: 19:39
 */

use App\Lesson;
use App\Tag;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class LessonTagTableSeeder extends Seeder
{
    public function run(){
        $faker = Faker::create();

        $lessonIds = Lesson::pluck('id')->all();
        $tagIds = Tag::pluck('id')->all();

        foreach(range(1, 30) as $index) {
            DB::table('lesson_tag')->insert([
                'lesson_id' => $faker->randomElement($lessonIds),
                'tag_id' => $faker->randomElement($tagIds)
            ]);

        }
    }
}