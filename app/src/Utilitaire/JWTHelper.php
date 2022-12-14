<?php
namespace App\Utilitaire;

use App\Entity\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTHelper
{
    public static function buildJWT(User $user): string
    {
        $payload = [
            "username" => $user->getUsername(),
            "exp" => (new \DateTime("+ 20 minutes"))->getTimestamp(),
        ];
        
        $id = "aYdrboQIVFmVURKgFdHg";

        return JWT::encode($payload, $id, "HS256");
    }

    public static function decodeJWT(string $jwt, string $id): ?object
    {
        try
        {
            return JWT::decode($jwt, new Key($id, "HS256"));
        } 
        catch (\Exception $exception)
        {
            return null;
        }
    }
}
?>