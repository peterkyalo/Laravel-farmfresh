<?php

namespace App\Policies;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AnimalPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {

        // return $user->animals()->exists();
        // Check if the authenticated user has any associated animals
    if (!$user->animals()->exists()) {
        return false;
    }

    // Check if the ID of the animal being viewed matches the ID of an animal associated with the user
     return true;

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        // return $user->id === $animal->user_id;

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Animal $animal): bool
    {
        return $user->id === $animal->user->id || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Animal $animal): bool
    {
        return $user->id === $animal->user->id || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Animal $animal): bool
    {
        return $user->id === $animal->user->id || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Animal $animal): bool
    {
        return $user->id === $animal->user->id || $user->hasRole('admin');
    }
}