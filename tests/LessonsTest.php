<?php

use Tests\ApiTester;

class LessonsTest extends ApiTester {

    public function it_fetches_lessons(){
        $this->makeLesson();
        $this->getJson('api/v1/lessons');
        $this->assertResponseOk();

    }

    private function makeLesson($lessonFields = [])
    {
        $lesson = array_merge([
            'title' => $this->fake->sentence,
            'body' => $this->fake->paragraph,
            'some_bool' => $this->fake->boolean
        ], $lessonFields);

        while ($this->times--) Lesson:create($lesson);
    }


}