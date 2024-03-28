<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $command;

    public function __construct($command)
    {
        $this->command = $command->load('user', 'match');
    }

    public function build()
{
    return $this->from('example@example.com')
                ->subject('Confirmation de commande')
                ->view('emails.order-confirmation')
                ->with([
                    'command' => $this->command,
                ]);
}

}

