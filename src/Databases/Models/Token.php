<?php
namespace App\Databases\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Token extends Eloquent
{
   protected $fillable = [
       'token',
   ];

   public function user() {
        return $this->belongsTo('App\Databases\Models\User', 'id', 'id');
   }
}