<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function show(User $user): UserResource
    {
        $data = User::findOrFail($user->id);
        return new UserResource($data);
    }

    public function store(UserRequest $request): UserResource
    {
        $user = User::create($request->validated());
        return new UserResource($user);
    }

    public function update(UserRequest $request, User $user): UserResource
    {
        $user->update($request->validated());
        return new UserResource($user);
    }

    public function destroy(Request $request, User $user): Response
    {
        $user->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
