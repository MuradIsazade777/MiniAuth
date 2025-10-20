<?php
function generate_jwt($payload, $secret, $expiry) {
    $header = base64_encode(json_encode(['alg' => 'HS256', 'typ' => 'JWT']));
    $payload['exp'] = time() + $expiry;
    $payload = base64_encode(json_encode($payload));
    $signature = hash_hmac('sha256', "$header.$payload", $secret, true);
    $signature = base64_encode($signature);
    return "$header.$payload.$signature";
}

function verify_jwt($token, $secret) {
    [$header, $payload, $signature] = explode('.', $token);
    $valid = base64_encode(hash_hmac('sha256', "$header.$payload", $secret, true));
    if ($valid !== $signature) return false;
    $data = json_decode(base64_decode($payload), true);
    return ($data['exp'] >= time()) ? $data : false;
}
