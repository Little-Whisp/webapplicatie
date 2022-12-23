<?php

namespace App\Policies;

use App\Models\Artwork;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ArtworkPolicy
{
    use HandlesAuthorization;

    public function before(User $user){
        if($user->isAdmin()){
            return Response::allow();
        }
    }


    public function viewAny(User $user): Response
    {
        return Response::allow();
    }


    public function view(User $user): Response
    {
        return Response::allow();
    }


    public function create(User $user): Response
    {
        if($user->isVerified()){
            return Response::allow();
        }
        return Response::denyAsNotFound();
    }


    public function update(User $user): Response
    {
        if($user->isVerified()){
            return Response::allow();
        }
        return Response::denyAsNotFound();
    }

    public function delete(User $user): Response
    {
        if($user->isVerified()){
            return Response::allow();
        }
        return Response::denyAsNotFound();
    }

    public function toggle(User $user): Response
    {
        return Response::denyAsNotFound();
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
