<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.04.2017
 * Time: 19:39
 */

use App\Tag;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    public function run(){
        $faker = Faker::create();

        foreach(range(1, 10) as $index){
            Tag::create([
                'name' => $faker->word

            ]);
        }
    }
}

