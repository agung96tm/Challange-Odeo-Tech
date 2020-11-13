<?php
namespace App\Core\Controllers;

class AbstractController {
    public function __construct() {
        header('Content-type: application/json');
    }

    public function request() {
        return json_decode(file_get_contents('php://input'), true);
    }

    public function response($data, $status=200) {
        http_response_code($status);
        echo json_encode($data);
    }
}