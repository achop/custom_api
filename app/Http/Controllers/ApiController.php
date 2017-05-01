<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.04.2017
 * Time: 16:33
 */

namespace App\Http\Controllers;

//use App\Http\Controllers\BaseController;

use App\Lesson;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as IlluminateResponse;

class ApiController extends Controller
{
    const HTTP_NOT_FOUND = 404;
    protected $statusCode = 200;

    public function getStatusCode(){
        return $this->statusCode;
    }

    public function setStatusCode($statusCode){
        $this->statusCode = $statusCode;
        return $this;
    }

    public function respondNotFound($message = 'Not Found!'){
        return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);

    }

    public function respondInternalError($message = 'Internal Error!'){
        return $this->setStatusCode(500)->respondWithError($message);

    }

    public function respond($data, $headers = []){
        return Response::json($data, $this->getStatusCode(), $headers);
    }

    public function respondWithError($message){
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    public function store()
    {
        if (!Input::get('title') or !Input::get('body')) {
            return $this->setStatusCode(422)
                ->respondWithError('Parameters failed validation for a lesson.');
        }

        Lesson::create(Input::all());

        return $this->respondCreated('Lesson successfully created.');
    }

    protected function respondCreated($message){
        return $this->setStatusCode(201)->respond([
            'message' => $message
        ]);
    }

}