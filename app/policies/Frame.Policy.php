<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Frame;
use Illuminate\Auth\Access\HandlesAuthorization;

class FramePolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->can('show frame');
    }

    public function create(User $user)
    {
        return $user->can('add frame');
    }

    public function update(User $user)
    {
        return $user->can('edit frame');
    }

    public function delete(User $user)
    {
        return $user->can('delete frame');
    }
}
