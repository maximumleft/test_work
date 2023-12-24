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

    public function show(Request $request, User $user): UserResource
    {
        $user = User::query()->where('id', $request->route('id'))->first();
        return new UserResource($user);
    }

    public function store(UserRequest $request): UserResource
    {
        $user = User::create($request->validated());
        return new UserResource($user);
    }

    public function update(UserRequest $request): UserResource
    {
        $user = User::query()->where('id', $request->route('id'))->first();
        $user->update($request->validated());
        return new UserResource($user);
    }

    public function destroy(Request $request): Response
    {
        $user = User::query()->where('id', $request->route('id'))->first();
        $user->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
