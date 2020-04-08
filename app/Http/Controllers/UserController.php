<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(UserRequest $request)
    {
        $user = User::create($validated = $request->validated());
        Arr::forget($validated, 'avatar');
        $user->profile->create(['user_id' => $user->id] + $validated);
        $user->refresh();
        $this->userService->handleUploadAvatar($user);
        return redirect(route('user.show', $user->id));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->profile->update($request->validated());
        $this->userService->handleUploadAvatar($user);
        return back();
    }

    public function show(User $user)
    {
        return view('profile.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('profile.edit', ['user' => $user]);
    }

    public function articles(User $user)
    {
        return response()->json($user->articles);
    }
}
