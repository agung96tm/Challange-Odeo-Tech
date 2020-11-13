<?php
namespace App\Databases\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;


class User extends Eloquent
{
   protected $fillable = [
       'name', 'email', 'password',
   ];

   protected $hidden = [
       'password',
   ];

   public function tokens() {
        return $this->hasMany('App\Databases\Models\Token');
   }

   public function mails() {
       return $this->hasMany('App\Databases\Models\Mail');
   }

   public function check_password($password) {
       return md5($password) == $this->password;
   }

   public function set_password($password) {
       $this->password = md5($password);
   }
}