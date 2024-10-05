<?php

namespace App\Model;

class UserWithVirtualProperty
{
    public string $firstName;
    public string $lastName;

    public function fullName(): string
    {
        return "$this->firstName $this->lastName";
    }
}
