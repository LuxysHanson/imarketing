<?php
/**
 * @OA\RequestBody(
 *    request="RegistrationRequest",
 *    description="Registration request body",
 *    @OA\JsonContent(
 *        type="object",
 *        @OA\Property(property="name", type="string", example="John Doe"),
 *        @OA\Property(property="email", type="string", example="admin@mail.com"),
 *        @OA\Property(property="phone", type="string", example="8-777-486-89-89"),
 *        @OA\Property(property="password", type="string", example="qwerty"),
 *        @OA\Property(property="password_confirmation", type="string", example="qwerty"),
 *    )
 * )
 */
