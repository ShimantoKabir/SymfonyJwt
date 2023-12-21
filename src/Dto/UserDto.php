<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;

class UserDto
{
    #[NotBlank(message: "Email can't be null!")]
    #[Type('string')]
    #[NotNull(message: "Email can't be null!")]
    public string $email;

    #[NotBlank(message: "Password can't be empty!")]
    #[Type('string')]
    #[NotNull(message: "Password can't be null!")]
    public string $password;
}