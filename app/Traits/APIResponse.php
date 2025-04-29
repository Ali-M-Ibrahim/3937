<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait APIResponse
{
    public function successResponse($message,$data,$code = Response::HTTP_OK){
        $response = [
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ];
        return response()->json($response, $code);
    }

    public function errorResponse($message, $data = [], $code = Response::HTTP_INTERNAL_SERVER_ERROR){
        $response = [
            'success' => false,
            'message' => $message,
        ];
        if(!empty($data)){
            $response['data'] = $data;
        }
        return response()->json($response, $code);
    }
}
