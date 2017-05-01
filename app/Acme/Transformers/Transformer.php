<?php

namespace Acme\Transformers;

/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.04.2017
 * Time: 16:01
 */
abstract class Transformer {

    public function transformCollection(array $items){
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);


}