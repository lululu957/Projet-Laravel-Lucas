<?php

// app/Mail/StudentPasswordMail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class StudentPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $password;

    public function __construct(User $student, $password)
    {
        $this->student = $student;
        $this->password = $password;
    }

    public function build()
    {
        return $this->subject("Votre mot de passe temporaire")
            ->view('emails.student_password')
            ->with([
                'student' => $this->student,
                'password' => $this->password,
            ]);
    }

}
