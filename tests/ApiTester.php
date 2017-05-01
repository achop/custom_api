<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01.05.2017
 * Time: 19:57
 */

namespace Tests;

use Faker\Factory as Faker;
class ApiTester extends TestCase
{
    protected $fake;
    protected $times = 1;

    function __construct(){
        $this->fake = Faker::create();
    }

    protected function times($count){
        $this->times = $count;

        return $this;
    }

    protected function getJson($uri)
    {
        return json_encode($this->call('GET', $uri)->getContent());
    }

}