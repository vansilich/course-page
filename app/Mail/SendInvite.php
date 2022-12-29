<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInvite extends Mailable
{
    use Queueable, SerializesModels;

    protected $param;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($param)
    {
        $this->param = $param;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('alex.new.alex.new@gmail.com', 'Курс Компас-3D')
            ->subject('Приглашение на курс')
            ->with([
                'name' => $this->param['name'],
                'email' => $this->param['email'],
                'telephone' => $this->param['telephone'],
            ])
            ->view('email');
    }
}
