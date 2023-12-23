<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
class AuthController extends AbstractController
{
    #[Route('/api/token/refresh', name: 'get-refresh-token', methods: "POST")]
    public function getRefreshToken(){}

    #[Route('/api/token/invalidate', name: 'invalidate-token', methods: "GET")]
    public function invalidateToken(){}
}