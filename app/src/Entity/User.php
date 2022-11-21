<?php

namespace App\Entity;

use App\Interfaces\PasswordProtectedInterface;
use App\Interfaces\UserInterface;

class User extends BaseEntity implements UserInterface, PasswordProtectedInterface
{
    private ?int $id = null;
    private string $username;
    private string $password;
    private int $roles;

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
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return int 
     */
    public function getRoles(): int
    {
        return $this->roles;
    }

    /**
     * @param int $roles
     * @return User
     */
    public function setRoles(int $roles): User
    {
        $this->roles = $roles;
        return $this;
    }

    public function getHashedPassword(): string
    {
        return $this->password;
    }

    public function passwordMatch(string $plainPwd): bool
    {
        return true;
    }

    public function setPassword(string $password): User
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);

        return $this;
    }
}
