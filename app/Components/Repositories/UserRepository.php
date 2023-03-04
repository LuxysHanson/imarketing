<?php

namespace App\Components\Repositories;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{

    public function getModel(): Model
    {
        return new User();
    }

    public function create(RegisterRequest $request)
    {

        $attributes = $request->validated();
        $attributes['password'] = Hash::make($request->get('password'));

        return $this->find()->create($attributes);
    }

}
