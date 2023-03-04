<?php
/**
 * @OA\RequestBody(
 *    request="LoginRequest",
 *    description="Auth request fields",
 *    @OA\JsonContent(
 *        type="object",
 *        required={"email", "password"},
 *        @OA\Property(property="email", type="string", example="admin@mail.com"),
 *        @OA\Property(property="password", type="string", example="qwerty"),
 *    )
 * )
 */
