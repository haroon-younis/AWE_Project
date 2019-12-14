<?php

namespace App\Notifications;

use App\Mail\TodoAdded;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CreatedTodo extends Notification
{
    use Queueable;
    
    public $car;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($car)
    {
        $this->car = $car;
        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
         $url = url('/cars/'.$this->car->id);
        
        return (new MailMessage)->markdown('mail.todo-added', ['url' => $url]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'make' => $this->car->make,
            'model' => $this->car->model,
            'description' => $this->car->description,
            'todo' => $this->car->todos,
        ];
    }
}
