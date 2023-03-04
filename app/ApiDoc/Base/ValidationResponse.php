<?php

namespace App\ApiDoc\Base;

/**
 * Class ValidationResponse
 * @package App\ApiDoc\Base
 * @OA\Schema(
 *     description="Validation errors response",
 *     title="Validation errors response"
 * )
 */
class ValidationResponse
{

    /**
     * @var string
     * @OA\Property(
     *     format="string",
     *     title="Message",
     *     description="Validation message",
     *     example="The given data was invalid."
     * )
     */
    public $message;

    /**
     * @OA\Property(
     *     type="object",
     *     title="Validation errors",
     *     description="Validation errors object",
     *     @OA\Property(property="field1", type="array", @OA\Items(example="The field1 field is required.")),
     *     @OA\Property(property="field2", type="array",  @OA\Items(example="The field2 field is required."))
     * )
     */
    public $errors;

}
