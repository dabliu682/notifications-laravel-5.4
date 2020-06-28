<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MessageSent extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mensaje)
    {
        $this->mensaje=$mensaje;
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
        // return (new MailMessage)
        //             ->greeting($notifiable->name . ',')
        //             ->subject('Mensaje recibido desde tu sitio Web')
        //             ->line('Has recibido un mensaje.')
        //             ->action('Click aqui para ver el mensaje', route('mensajes.show', $this->mensaje->id))
        //             ->line('Gracias por usar mi aplicacion !');

        return (new MailMessage)->view('email.notification',
            [
                'msg' => $this->mensaje,
                'user' => $notifiable,
            ]
        )->subject('Mensaje recibido desde Dabliu.com');

        // return(new CustomMail($mensaje))->to($notifiable->email);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return
        [
            'link' => route('mensajes.show', $this->mensaje->id),
            'text' => 'Has recibido un mensaje de '. $this->mensaje->sender->name
        ];
    }
}
