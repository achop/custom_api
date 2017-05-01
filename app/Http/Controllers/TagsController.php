<?php

namespace App\Http\Controllers;

use Acme\Transformers\TagTransformer;
use App\Lesson;
use app\Tag;

use Illuminate\Http\Request;
use Mockery\Exception;

class TagsController extends ApiController
{
    protected $tagTransformer;

    function __construct(TagTransformer $tagTransformer)
    {
        $this->tagTransformer = $tagTransformer;
    }

    public function index($lessonId = null){
//        $tags = $this->getTags($lessonId);
        $tags = $lessonId ? Lesson::find($lessonId)->tags : Tag::all();

        return $this->respond([
            'data' => $this->tagTransformer->transformCollection($tags->all())
        ]);
    }

//    private function getTags($lessonId){
//
//        return $lessonId ? Lesson::findOrFail($lessonId)->tags : Tag::all();
//    }
}
