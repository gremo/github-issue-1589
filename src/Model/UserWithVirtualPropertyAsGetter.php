<?php

namespace App\Model;

class UserWithVirtualPropertyAsGetter
{
    public string $firstName;
    public string $lastName;

    public function getFullName(): string
    {
        return "$this->firstName $this->lastName";
    }
}
