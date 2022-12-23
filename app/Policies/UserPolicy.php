<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    public function before(User $user){
        if($user->isAdmin()){
            return Response::allow();
        }
        return;
    }


    public function viewAny(User $user): Response
    {
        return Response::denyAsNotFound();
    }


    public function view(User $user): Response
    {
        return Response::denyAsNotFound();
    }


    public function create(User $user): Response
    {
        return Response::denyAsNotFound();
    }


    public function update(User $user): Response
    {
        return Response::allow();
    }


    public function delete(User $user): Response
    {
        return Response::allow();
    }


    public function restore(User $user): Response
    {
        return Response::denyAsNotFound();
    }


    public function forceDelete(User $user): Response
    {
        return Response::denyAsNotFound();
    }
}
