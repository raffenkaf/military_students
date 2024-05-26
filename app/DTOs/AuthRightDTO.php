<?php

namespace App\DTOs;

class AuthRightDTO
{
    public function __construct(public int $accessType, public array $accessDetails)
    {
    }
}
