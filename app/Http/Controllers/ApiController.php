<?php
/**
 * Created by PhpStorm.
 * User: fabien
 * Date: 03/08/2018
 * Time: 09:22
 */

namespace App\Http\Controllers;


use Illuminate\Http\Response;

class ApiController extends Controller
{

    protected $statusCode = Response::HTTP_OK;

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function respondNotFound($message = 'Not found!')
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)->respondWithError($message);
    }

    public function respondInternalError($message = 'Internal Error!')
    {
        return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
        //usage in controller = return $this->respondInternalError();
    }

    public function respond($data, $message)
    {
        $response = [
            'success' => true,
            'data'    => $data,
            'message' => $message
        ];
        return Response()->json($response, $this->getStatusCode());
    }

    public function respondWithError($error, $errorMessages = [], $code = Response::HTTP_NOT_FOUND)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return Response()->json($response, $code);
    }

    public function respondValidationError($message, $error)
    {
        return $this->respondWithError($message, $error, Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function respondCreated($data, $message)
    {
        return $this->setStatusCode(Response::HTTP_CREATED)->respond($data, $message);
    }
}