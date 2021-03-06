<?php

namespace App\Notifications\Coach;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewGoalNotification extends Notification
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
        // dd($notifiable);

        $player = \DB::table('users')->where('id',$notifiable->player_id)->first();
        $coach_id = isset($notifiable->coach_id) ? $notifiable->coach_id: '';

        if($notifiable->created_at != $notifiable->updated_at){
            $msg = 'has updated his goal.';
        }else{
            $msg = 'has uploaded new goal.';
        }

        if(!empty($coach_id))
        {
            return [
                'send_to' => $coach_id,
                'data' => 'Linked Player - '.$player->name.' - '.$msg
            ];
        }
        else
        {
            return [
                // 
            ];
        }
        
    }
}
