<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Tests\Fixtures\Metadata\Get;
use App\Controller\AuthController;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;

#[ApiResource(operations: [
    new Post(
        uriTemplate: '/api/token/refresh',
        controller: AuthController::class,
        shortName: "Token Refresh",
        name: "get-refresh-token"
    ),
    new Post(
        uriTemplate: '/api/token/invalidate',
        controller: AuthController::class,
        shortName: "Token Invalidate",
        name: "invalidate-token"
    )
])]
class RefreshTokenDto
{
    #[NotBlank(message: "Refresh token can't be empty!")]
    #[Type('string')]
    #[NotNull(message: "Refresh token can't be null!")]
    public string $refresh_token;
}