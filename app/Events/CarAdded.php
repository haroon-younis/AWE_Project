<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class CarAdded
{
    use Dispatchable, SerializesModels;
    
    public $car;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($car)
    {
        $this->car = $car;
    }

}
