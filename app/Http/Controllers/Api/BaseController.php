<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

/**
 * Базовый класс для работы с API
 *
 * Class BaseController
 * @package App\Http\Controllers\Api
 */
class BaseController extends Controller
{

    /**
     * @param array|Collection|JsonResource $result
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendResponse($result, string $message)
    {

        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message
        ];

        return response()->json($response, 200);
    }

    /**
     * @param string $error
     * @param array $errorMessages
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendError(string $error, array $errorMessages = [], int $code = 404)
    {

        $response = [
            'success' => false,
            'message' => $error
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

}
