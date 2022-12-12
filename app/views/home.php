<?php

    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    $key = uniqid('key', false);
    $payload = [
        'iss' => 'http://localhost:3000',
        'aud' => 'http://localhost:5656',
        'iat' => time(),
    ];
    $jwt = JWT::encode($payload, $key, 'HS256');

    $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
    echo json_encode([
        "jxt" => $jwt
    ]);
    die;
?>

