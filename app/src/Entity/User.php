<?php

namespace App\Entity;

use app\Interfaces\PasswordProtectedInterface;
use App\Interfaces\UserInterface;

class User extends BaseEntity implements UserInterface, PasswordProtectedInterface
{
    private ?int $id;
    private string $username;
    private string $password;
    private int $role;

    /**
     * @return int 
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(string $username): User
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUserName(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    public function getHashedPassword(): string
    {
        return $this->hashedPassword;
    }

    public function passwordMatch(string $plainPwd): bool
    {
        return true;
    }
}
