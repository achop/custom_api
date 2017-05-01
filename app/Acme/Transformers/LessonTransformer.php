<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.04.2017
 * Time: 16:04
 */

namespace Acme\Transformers;


class LessonTransformer extends Transformer
{

    public function transform($lesson)
    {

        return [
            'title' => $lesson['title'],
            'body' => $lesson['body'],
            'active' => (boolean) $lesson['some_bool']
        ];

    }

}