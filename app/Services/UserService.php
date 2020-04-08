<?php


namespace App\Services;


use App\Models\User;

class UserService
{
    public function handleUploadAvatar(User $user)
    {
        if ($this->canHandleAvatar()) {
            $avatar = request()->file('avatar');
            $path = $avatar->storeAs($user->id, sprintf('avatar.%s', $avatar->extension()),'public');
            $user->profile->update(['avatar' => $path]);
        }
    }

    protected function canHandleAvatar()
    {
        return request()->hasFile('avatar');
    }
}