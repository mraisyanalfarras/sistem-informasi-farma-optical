<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Lensa;
use Illuminate\Auth\Access\HandlesAuthorization;

class LensaPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->can('show lensas');
    }

    public function create(User $user)
    {
        return $user->can('add lensas');
    }

    public function update(User $user)
    {
        return $user->can('edit lensas');
    }

    public function delete(User $user)
    {
        return $user->can('delete lensas');
    }
}
