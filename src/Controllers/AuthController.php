<?php
namespace App\Controllers;

use App\Databases\Models\User;
use App\Core\Auth\Controllers\AbstractAuthController;


class AuthController extends AbstractAuthController {
    public function login() {
        $data = $this->serializer($this->request());
        if (!$this->is_valid) {
            return $this->response(['message' => 'Email or Password is invalid']);
        }

        $user = User::where('email', '=', $data['email'])->first();

        if ($user && $user->check_password($data['password'])) {
            // generate random token used for logged-in (authorized)
            $result = $user->tokens()->create([
                'token' => $this->random(6),
            ]);
            return $this->response(['token' => $result->token]);
        }
        return $this->response(['message' => 'email or password is invalid'], 400);
    }

    // Serializer
    public $fields = ['email', 'password'];
    public $is_valid = true;

    public function serializer($data) {
        $result = [];
        foreach ($data as $field => $value) {
            if (in_array($field, $this->fields)) {
                $result[$field] = $value;
            }
        }
        return $result;
    }

    // Token
    public function random($len) {
        $char = 'abcdefghijklmnopqrstuvwxyz';

        $pos = strlen($char);
        $pos = pow($pos, $len);

        $total = strlen($char)-1;
        $text = "";

        for ($i=0; $i<$len; $i++){
            $text = $text.$char[rand(0, $total)];
        }

        return $text;
   }
}