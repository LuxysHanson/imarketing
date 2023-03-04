<?php

namespace App\ApiDoc\Base;

/**
 * Class UnauthenticatedResponse
 * @package App\ApiDoc\Base
 * @OA\Schema(
 *     description="Unauthenticated response schema",
 *     title="Unauthenticated response"
 * )
 */
class UnauthenticatedResponse
{

    /**
     * @var string
     * @OA\Property(type="string", example="Unauthenticated.")
     */
    public $message;

}
