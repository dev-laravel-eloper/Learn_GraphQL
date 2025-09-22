<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponser {

    /**
     * @param $data
     * @param $code
     * @param $massage
     * @return JsonResponse
     */
    public function SuccessResponse($data , $code , $massage = null): JsonResponse
    {
        return response()->json([
            'status' =>  'success' ,
            'massage' => $massage ,
            'data' => $data
        ] , $code);
    }

    /**
     * @param $code
     * @param $massage
     * @return JsonResponse
     */
    public function ErrorResponse($code , $massage = null): JsonResponse
    {
        return response()->json([
            'status' =>  'error' ,
            'massage' => $massage ,
            'data' => ''
        ] , $code);
    }
}
