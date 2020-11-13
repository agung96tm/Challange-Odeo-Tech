<?php
namespace App\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Mail {
    public $mail;

    public function __construct() {
        $this->setup();
    }

    public function setup() {
        try {
            $this->mail = new PHPMailer(true);
            $this->mail->SMTPDebug = false;
            $this->mail->isSMTP();                                          
            $this->mail->Host       = 'smtp.mailtrap.io';                  
            $this->mail->SMTPAuth   = true;                                 
            $this->mail->Username   = '42730f78202ad6';                   
            $this->mail->Password   = '116fcda2659b10';
            $this->mail->Port       = 2525; 
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }    

    public function send($from, $to, $subject, $body) {
        $this->mail->setFrom($from);
        $this->mail->addAddress($to);

        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body    = $body;
        $this->mail->AltBody = $body;

        $this->mail->send();
    }
}