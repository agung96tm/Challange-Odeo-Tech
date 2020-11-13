<?php

namespace App\Controllers;


use App\Core\Controllers\AbstractController;


class PageController extends AbstractController {
    public function home() {
        return $this->response([
            'ping' => 'pong',
        ]);
    }
}