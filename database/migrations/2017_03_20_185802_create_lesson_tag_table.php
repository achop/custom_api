<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLessonTagTable extends Migration {
    public function up(){
        Schema::create('lesson_tag', function(Blueprint $table){
            $table->increments('id');
            $table->integer('lesson_id')->unsigned()->index();
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
            $table->integer('tag_id')->unsigned()->index();
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
//            $table->timestamps();
        });

    }

    public function down(){
        Schema::dropIfExists('lesson_tag');
    }

}