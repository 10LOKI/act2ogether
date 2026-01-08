<?php
namespace App\Controllers;

use App\Core\Controller;

class ApiController extends Controller
{
    public function index()
    {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'ok']);
    }
}
