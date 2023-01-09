<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CourseSignUp extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        protected string $course_name,
        protected string $user_name,
        protected string $user_email,
        protected string $mail_from_title,
        protected string $mail_subject = 'Приглашение на курс',
        protected ?string $course_link = null,
    ){}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('alex.new.alex.new@gmail.com', $this->mail_from_title)
        ->subject($this->mail_subject)
        ->with([
            'course_name' => $this->course_name,
            'name' => $this->user_name,
            'email' => $this->user_email,
            'course_link' => $this->course_link,
        ])
        ->view('emails.CourseSignUp');
    }
}
