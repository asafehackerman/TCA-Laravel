<?php

namespace App\Policies;

use App\Models\Pizza;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use App\Http\Controllers\PermissionController;

class PizzaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return PermissionController::isAuthorized('pizza.index');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Pizza $pizza): bool
    {
        return PermissionController::isAuthorized('pizza.show');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return PermissionController::isAuthorized('pizza.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Pizza $pizza): bool
    {
        return PermissionController::isAuthorized('pizza.edit');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Pizza $pizza): bool
    {
        return PermissionController::isAuthorized('pizza.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Pizza $pizza): bool
    {
        return PermissionController::isAuthorized('pizza.delete');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Pizza $pizza): bool
    {
        return PermissionController::isAuthorized('pizza.delete');
    }
}
