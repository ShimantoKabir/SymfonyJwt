<?php

namespace App\Controller;

use App\ApiResource\UserDto;
use App\Exception\AlreadyExistsException;
use App\Mapper\UserMapper;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

#[AsController]
class UserController extends AbstractController
{
    public UserService $userService;
    public UserMapper $userMapper;

    public function __construct(UserService $userService, UserMapper $userMapper)
    {
        $this->userService = $userService;
        $this->userMapper = $userMapper;
    }

    /**
     * @throws AlreadyExistsException
     * @throws ExceptionInterface
     */
    #[Route('/user/registration', name: 'user-registration', methods: "POST")]
    public function registration(#[MapRequestPayload] UserDto $userDto): JsonResponse
    {
        $user = $this->userService->registration($this->userMapper->dtoToEntity($userDto));
        return $this->json($this->userMapper->entityToDto($user));
    }

    #[Route('/api/users', name: 'get-all-users', methods: "GET")]
    public function getAllUser(): JsonResponse
    {
        return $this->json($this->userService->getAllUser());
    }
}
