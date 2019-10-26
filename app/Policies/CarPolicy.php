<?php

namespace App\Policies;

use App\User;
use App\Car;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Car $car)
    {
        return $car->owner_id == $user->id;
    }

    
}
