<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class LinkRequestNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        //dd($notifiable);
        $parent = \DB::table('users')->where('parent_id',$notifiable->parent_id)->first(); 
        $coach_name = getUsername($notifiable->coach_id);
        $child_name = getUsername($notifiable->child_id);

        if($notifiable->status == 1)
        {
            $status = 'Accepted';
        }else{
            $status = 'Denied';
        }

        return [
            'send_to' => $notifiable->parent_id,
            'data' => $coach_name.' has '.$status.' your link request for player - '.$child_name,
            'reason_of_rejection'   => $notifiable->reason_of_rejection
        ];
    }
}
