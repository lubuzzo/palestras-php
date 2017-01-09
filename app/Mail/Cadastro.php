<?php

namespace SeCoT\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Cadastro extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Nome, $Qr)
    {
        $this->Nome = $Nome;
        $this->Qr = $Qr;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->view('emails.cadastro')
        ->with(['name' => $this->Nome, 'QR' => $this->Qr])
        ->attach('https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' . $this->Qr, ['as' => 'SeCoT-QR', 'mime' => 'image/png']);
    }
}
