<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CustomerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Customer $customer): Response
    {
        return $user->id === $customer->user_id ? Response::allow()
        : Response::deny('You do not own this customer.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Customer $customer): Response
    {
        return $user->id === $customer->user_id ? Response::allow()
        : Response::deny('You do not own this customer.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Customer $customer): Response
    {
        return $user->id === $customer->user_id ? Response::allow()
        : Response::deny('You do not own this customer.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Customer $customer): Response
    {
        return $user->id === $customer->user_id ? Response::allow()
        : Response::deny('You do not own this customer.');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Customer $customer): Response
    {
        return $user->id === $customer->user_id ? Response::allow()
        : Response::deny('You do not own this customer.');
    }
}
