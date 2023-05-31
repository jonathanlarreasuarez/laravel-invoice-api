<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait RestResponse
{

    /**
     * success
     *
     * @param  mixed $data
     * @param  mixed $code
     * @return JsonResponse
     */
    public function success($data = [], $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json($data, $code);
    }

    /**
     * success response method.
     *
     * @param $result
     * @param string $message
     * @return JsonResponse
     */
    public function sendResponse($result, string $message): JsonResponse
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @param string $error
     * @param array $errorMessages
     * @param int $code
     * @return JsonResponse
     */
    public function sendError(string $error, array $errorMessages = [], int $code = 404) : JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;

        }
        return response()->json($response, $code);
    }
}
