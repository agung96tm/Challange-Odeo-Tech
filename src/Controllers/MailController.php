<?php

namespace App\Controllers;

use App\Databases\Models\User;
use App\Databases\Models\Mail;
use App\Core\Controllers\AbstractController;

use App\Mail\Mail as Mailing;


class MailController extends AbstractController {
    public function send() {
        // authenticated
        $user = $this->isAuthorized();
        if (!$user) {
            return $this->response(['message' => 'unauthorized'], 401);
        }

        // validate serializer
        $data = $this->serializer($this->request());
        if (!$this->is_valid) {
            return $this->response(['message' => 'subject and body are required']);
        }

        // save email and send mail
        $mail = $user->mails()->create([
            'title' => $data['subject'],
            'body' => $data['body']
        ]);

        $mailing = new Mailing();
        $mailing->send(MAIL_ADMIN, $user->email, $mail->title, $mail->body);
        return $this->response(
            ['message' => 'success send mail to: ' . $user->email], 
            201
        );
    }

    // Serializer
    public $fields = ['subject', 'body'];
    public $is_valid = true;

    public function serializer($data) {
        $result = [];
        foreach ($data as $field => $value) {
            if (in_array($field, $this->fields)) {
                $result[$field] = $value;
            }
        }
        
        if (count($result) <= 0) {
            $this->is_valid = false;
        }
        foreach ($result as $key => $value) {
            if (!in_array($field, $this->fields)) {
                $this->is_valid = false;
            }
        }
        
        return $result;
    }

    // Auth
    public function isAuthorized() {
        $result = apache_request_headers();
        if ($result['Authorization']) {
            $token = $result['Authorization'];

            $user = User::whereHas('tokens', function ($q) use ($token) {
                $q->where('token', $token);
            })->first();

            if ($user) {
                return $user;
            }
        }

        return false;
    }
}