<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use App\Controller\UserController;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;

#[ApiResource(operations: [
    new Post(
        uriTemplate: '/user/registration',
        controller: UserController::class,
        shortName: "User",
        name: "user-registration"
    ),
    new Get(
        uriTemplate: '/api/users',
        controller: UserController::class,
        shortName: "User",
        name: "get-all-users"
    )
])]
class UserDto
{
    #[NotBlank(message: "Email can't be empty!")]
    #[Type('string')]
    #[NotNull(message: "Email can't be null!")]
    public string $email;

    #[NotBlank(message: "Password can't be empty!")]
    #[Type('string')]
    #[NotNull(message: "Password can't be null!")]
    public string $password;
}