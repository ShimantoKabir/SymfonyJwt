<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Post;
use App\Controller\UserController;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;

#[ApiResource(operations: [
    new Post(
        uriTemplate: '/user/registration',
        controller: UserController::class,
        read: false,
        name: 'user-registration'
    )
])]
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