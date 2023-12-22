<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }

    public function store(UserRequest $request): UserResource
    {
        $user = User::create($request->validated());
        return new UserResource($user);
    }

    public function update(UserRequest $request, User $user): UserResource
    {
        $data = $request->validated();
        $user = $this->servise->update($user, $data);
        return new UserResource($user);
    }

    public function destroy(User $user): void
    {
        $user->delete();
    }
}
