<?php

namespace AWE\Policies;

use AWE\User;
use AWE\Car;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Car $car)
    {
        return $car->owner_id == $user->id;
    }

    
}
