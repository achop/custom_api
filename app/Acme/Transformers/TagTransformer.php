<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.04.2017
 * Time: 16:04
 */

namespace Acme\Transformers;


class TagTransformer extends Transformer
{

    public function transform($tag)
    {

        return [
            'name' => $tag['name']
        ];

    }

}