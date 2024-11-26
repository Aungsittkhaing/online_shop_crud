<?php
if (!function_exists('apiResponse')) {
    function apiResponse($data, $message, $statusCode)
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'statusCode' => $statusCode
        ]);
    }
}
