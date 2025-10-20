<?php
require 'auth.php';
$config = require 'config.php';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

if ($uri === '/register' && $method === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    echo register($data['username'], $data['password']) ? 'Registered' : 'Error';
}
elseif ($uri === '/login' && $method === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $token = login($data['username'], $data['password']);
    echo $token ? json_encode(['token' => $token]) : 'Invalid credentials';
}
elseif ($uri === '/profile' && $method === 'GET') {
    $headers = getallheaders();
    if (!isset($headers['Authorization'])) {
        http_response_code(401);
        echo 'No token';
        exit;
    }
    $token = str_replace('Bearer ', '', $headers['Authorization']);
    $user = verify_jwt($token, $config['jwt_secret']);
    echo $user ? json_encode($user) : 'Invalid token';
}
else {
    http_response_code(404);
    echo 'Not found';
}
