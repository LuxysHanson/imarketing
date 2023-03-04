<?php

namespace App\Http\Controllers\Api;

use App\Components\Repositories\UserRepository;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;

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

    public function loginUser(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');
        if (auth()->once($credentials)) {
            $response = new UserResource(auth()->user());
            return $this->sendResponse($response, 'User signed in.');
        }

        return $this->sendError('Unauthorised.');
    }

    public function createUser(RegisterRequest $request)
    {
        $user = $this->repository->create($request);
        return $this->sendResponse(new UserResource($user), 'User created successfully.');
    }

}
