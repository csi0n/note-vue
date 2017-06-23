<?php
namespace App\Services;

use Response;
class ApiResponseService
{

    public static function  success($result = [], $message = 'success', $statusCode = 200, $header = [])
    {
        if( (is_array($result) or is_object($result)) AND !empty($result)){
            $responseResult['message']   = $message;
            $responseResult['result']   = $result;
        }elseif(func_num_args() === 0){
            $responseResult['message']  = $message;
            $responseResult['result']  = [];
        }
        else{
            $responseResult['message']  = $result;
            $responseResult['result']  = [];
        }
        if( $statusCode == 304 ){
            header('server-response-code: 304');
            exit;
        }
        return Response::json($responseResult, $statusCode, array_merge(['status_code'=> $statusCode], $header), session('json_mode',JSON_NUMERIC_CHECK));
    }

    /**
     * @param string $message
     * @param int $statusCode
     * @param array $result
     * @return \Illuminate\Http\JsonResponse
     */
    public static function fail($message = 'fail', $statusCode = 500, $result = [])
    {
        $responseResult = ['message' => $message, 'result'=> $result];
        return Response::json($responseResult, $statusCode, ['server-response-code'=>$statusCode], session('json_mode',JSON_NUMERIC_CHECK));
    }
}