<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pesanan;
use Illuminate\Auth\Access\HandlesAuthorization;

class PesananPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->can('show pesanans');
    }

    public function create(User $user)
    {
        return $user->can('add pesanans');
    }

    public function update(User $user)
    {
        return $user->can('edit pesanans');
    }

    public function delete(User $user)
    {
        return $user->can('delete pesanans');
    }
}
