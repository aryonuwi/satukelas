<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function responseSuccess($response,$message = '',$typeCode = '')
    {
        switch ($typeCode) {
            case 'created':
                    $code = 201;
                break;

            case 'deleted':
                    $code = 204;
                break;

            default:
                    $code = 200;
                break;
        }

        return response()->json([
            "status"    => "success",
            "message"   => $message,
            "result"    => $response
        ], $code);
    }

    public function responseFailed($message=array(),$typeCode='')
    {
        switch ($typeCode) {
            case 'notfound':
                $code = '404';
                break;

            case 'permission':
                $code = '403';
                break;

            default:
                $code = '400';
                break;
        }
        return response()->json([
            "status"    => "failed",
            "message"   => $message
        ], $code);
    }
}
