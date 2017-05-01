<?php

//namespace App;

use App\Tag;
use Illuminate\Database\Seeder;
use App\Lesson;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    private $tables = [
        'lessons',
        'tags',
        'lesson_tag'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::statement('SET FOREIGN_KEY_CHECKS=0');
//        Lesson::truncate();
//        Tag::truncate();
//        DB::table('lesson_tag')->truncate();
//        DB::statement('SET FOREIGN_KEY_CHECKS=1');
//        DB:table('lessons')->truncate();
        
        Eloquent::unguard();
         $this->call('LessonsTableSeeder');
         $this->call('TagsTableSeeder');
         $this->call('LessonTagTableSeeder');
    }

    public function cleanDatabase(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($this->table as $tableName){
            DB::table($tableName)->truncate();
        }

//        Lesson::truncate();
//        Tag::truncate();
//        DB::table('lesson_tag')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
