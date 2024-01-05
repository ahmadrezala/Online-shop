<?php

namespace App\Channels;

use Ghasedak\GhasedakApi;
use Illuminate\Notifications\Notification;
use Ghasedak\Laravel\GhasedakFacade;
class SmsChannel
{
    public function send($notifiable, Notification $notification)
    {

        return 'Done!';

        $receptor = $notifiable->cellphone;
        $type = 1;
        $template = "Test";
        $param1 = $notification->code;

        $api = new GhasedakApi(env('GHASEDAKAPI_KEY'));
        $api->Verify($receptor, $type, $template, $param1);
    }
}
