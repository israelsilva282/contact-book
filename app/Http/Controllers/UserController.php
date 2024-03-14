<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use HttpResponses;
    public function register(CreateUserRequest $request)
    {
        $created = User::create($request->validated());

        if (!$created) {
            return $this->error('Something Went Wrong', 400);
        }

        return $this->response('Usuário criado', 200);
    }
}
