<?php

namespace App\ApiDoc\Base;

/**
 * Class SuccessResponse
 * @package App\ApiDoc\Auth
 * @OA\Schema(
 *     description="Success response",
 *     title="Success response"
 * )
 */
class SuccessResponse
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
     *     title="Data",
     *     description="Success response object",
     *     @OA\Property(property="field1", type="string", example="Example string"),
     *     @OA\Property(property="field2", type="array",  @OA\Items(example="The field2 field is required."))
     * )
     */
    public $data;

}
