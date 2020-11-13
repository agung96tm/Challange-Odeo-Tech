<?php
namespace App\Databases\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Mail extends Eloquent
{
    protected $fillable = [
       'title', 'body',
    ];

    public function user() {
        return $this->belongsTo('App\Databases\Models\User', 'id', 'id');
    }
}