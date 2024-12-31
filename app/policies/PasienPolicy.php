<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pasien;
use Illuminate\Auth\Access\HandlesAuthorization;

class PasienPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->can('show pasiens');
    }

    public function create(User $user)
    {
        return $user->can('add pasiens');
    }

    public function update(User $user)
    {
        return $user->can('edit pasiens');
    }

    public function delete(User $user)
    {
        return $user->can('delete pasiens');
    }
}
