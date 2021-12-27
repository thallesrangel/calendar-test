<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class SendEmail
{
    public function send($people)
    {

        if(!empty($people[0])) {
            $details = [
                'title' => 'Cancelamento da aula',
                'body' => 'A aula ' . $people[0]->classes->name_class. ' foi cancelada.'
            ];
            
            foreach($people as $item) {
                Mail::to($item->people->email)->send(new \App\Mail\EmailCancellation($details));
            }
        }
    }
}
