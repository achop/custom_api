<?php

namespace App\Http\Controllers;

use Acme\Transformers\LessonTransformer;
use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

/**
 * @property  lessonTransformer
 */

class LessonsController extends ApiController
{
    protected $lessonTransformer;

    function __construct(LessonTransformer $lessonTransformer)
    {

        $this->lessonTransformer = $lessonTransformer;
        $this->middleware('auth.basic', ['only' => 'store']);
    }


    public function index()
    {

        $lessons = Lesson::all();
        return $this->respond([
            'data' => $this->lessonTransformer->transformCollection($lessons->all())
        ]);
    }

    public function show($id)
    {

        $lesson = Lesson::find($id);

        if (!$lesson) {

            return $this->respondNotFound('Lesson does not exist.');
        }

        return $this->respond([
            'data' => $this->lessonTransformer->transform($lesson)

        ]);
    }

//    public function store()
//    {
//        if (!Input::get('title') or !Input::get('body')) {
//            return $this->setStatusCode(422)
//                ->respondWithError('Parameters failed validation for a lesson.');
//        }
//
//        Lesson::create(Input::all());
//
//        return $this->respondCreated();
//    }

    protected function respondCreated($message){
        return $this->setStatusCode(201)->respond([
            'message' => 'Lesson successfully created'
        ]);
    }

}



