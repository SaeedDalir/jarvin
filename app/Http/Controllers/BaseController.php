<?php namespace App\Http\Controllers;

use Illuminate\Http\Response;

class BaseController extends Controller
{
    protected $statusCode = 200;
    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
    /**
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function respondNotFound($message = 'Not Found!')
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)->respondError($message);
    }

    public function respondUnAuthorized($message = 'Authorization Failed')
    {
        return $this->setStatusCode(Response::HTTP_UNAUTHORIZED)->respondError($message);
    }

    public function respondInternalServerError($message = 'Internal server error!')
    {
        return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)->respondError($message);
    }

    public function respondAuthenticationError($message = 'Authentication Failed')
    {
        return $this->setStatusCode(Response::HTTP_UNAUTHORIZED)->respondError($message);
    }

    public function respondOk($message = 'successful')
    {
        return $this->respond([
            'message' => $message,
            'status' => 'success'
        ]);
    }

    public function respondError($message = 'Operation Failed')
    {
        $this->respond([
            'message' => $message,
            'status' => 'error'
        ]);
    }

    public function respondArray($data = [], $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }
}
