<?php

namespace AWE\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CarAdded extends Mailable
{
    use Queueable, SerializesModels;
    
    public $car;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($car)
    {
        $this->car = $car;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.car-added');
    }
}
