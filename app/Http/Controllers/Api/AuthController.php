<?php

namespace App\Http\Controllers\Api;

use App\Components\Repositories\UserRepository;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;

/**
 * Class AuthController
 * @package App\Http\Controllers\Api
 * @OA\Tag(name="auth")
 */
class AuthController extends BaseController
{
    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Post(
     *     path="/api/auth/login",
     *     tags={"auth"},
     *     operationId="login",
     *     @OA\RequestBody(
     *         request="LoginRequest",
     *         description="Auth request fields",
     *         @OA\JsonContent(
     *             type="object",
     *             required={"email", "password"},
     *             @OA\Property(property="email", type="string", example="admin@mail.com"),
     *             @OA\Property(property="password", type="string", example="qwerty"),
     *         )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Success auth response",
     *          @OA\JsonContent(ref="#/components/schemas/SuccessResponse")
     *      ),
     *     @OA\Response(
     *          response=401,
     *          description="User not authorized. Wrong email or password.",
     *          @OA\JsonContent(ref="#/components/schemas/UnauthenticatedResponse")
     *      ),
     *     @OA\Response(
     *          response=422,
     *          description="Validation errors.",
     *          @OA\JsonContent(ref="#/components/schemas/ValidationResponse")
     *      )
     * )
     */
    public function loginUser(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');
        if (auth()->once($credentials)) {
            $response = new UserResource(auth()->user());
            return $this->sendResponse($response, 'User signed in.');
        }

        return $this->sendError('Unauthorised.');
    }

    /**
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Post(
     *     path="/api/auth/register",
     *     tags={"auth"},
     *     operationId="register",
     *     @OA\RequestBody(
     *         request="RegistrationRequest",
     *         description="Registration request body",
     *         @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="name", type="string", example="John Doe"),
     *              @OA\Property(property="email", type="string", example="admin@mail.com"),
     *              @OA\Property(property="phone", type="string", example="8-777-486-89-89"),
     *              @OA\Property(property="password", type="string", example="qwerty"),
     *              @OA\Property(property="password_confirmation", type="string", example="qwerty"),
     *         )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="User successfully registered",
     *      ),
     *     @OA\Response(
     *          response=500,
     *          description="Server error"
     *      ),
     *     @OA\Response(
     *          response=422,
     *          description="Validation errors.",
     *          @OA\JsonContent(ref="#/components/schemas/ValidationResponse")
     *      )
     * )
     */
    public function createUser(RegisterRequest $request)
    {
        $user = $this->repository->create($request);
        return $this->sendResponse(new UserResource($user), 'User created successfully.');
    }

}
