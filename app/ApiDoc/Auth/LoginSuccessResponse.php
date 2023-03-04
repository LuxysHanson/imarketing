<?php

namespace App\ApiDoc\Auth;

/**
 * Class LoginSuccessResponse
 * @package App\ApiDoc\Auth
 * @OA\Schema(
 *     description="Success auth response",
 *     title="Login response"
 * )
 */
class LoginSuccessResponse
{

    /**
     * @var boolean
     * @OA\Property(type="boolean", example="true")
     */
    public $success;

    /**
     * @var string
     * @OA\Property(type="string", example="User signed in.")
     */
    public $message;

    /**
     * @OA\Property(
     *     type="object",
     *     title="Validation errors",
     *     description="Validation errors object",
     *     @OA\Property(property="user_name", type="string"),
     *     @OA\Property(property="token", type="string")
     * )
     */
    public $data;

}
