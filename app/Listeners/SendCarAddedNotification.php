<?php

namespace App\Listeners;

use App\Events\CarAdded;
use App\Mail\CarAdded as CarAddedMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCarAddedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CarAdded  $event
     * @return void
     */
    public function handle(CarAdded $event)
    {
        Mail::to($event->car->owner->email)->send(
            new CarAddedMail($event->car)
        );
    }
}
