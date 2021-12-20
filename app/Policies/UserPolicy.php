<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        return $this->isAdmin($user);
    }


    public function view(User $user, User $model)
    {
        return $this->isAdmin($user)
            || $user->id === $model->id;
    }


    public function create(User $user)
    {
        return $this->isAdmin($user);
    }


    public function update(User $user, User $model)
    {
        return $this->isAdmin($user) || $user->id === $model->id;
    }


    public function delete(User $user)
    {
        return $this->isAdmin($user);
    }

    public function isAdmin(User $user)
    {
        return $user->role === 'admin';
    }


}
