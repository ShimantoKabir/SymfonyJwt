<?php

namespace App\Service;

use App\Entity\User;
use App\Exception\AlreadyExistsException;
use App\Repository\UserRepository;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param User $user
     * @return null|User
     * @throws AlreadyExistsException
     */
    public function registration(User $user): ?User
    {
        $existUser = $this->userRepository->findByEmail($user->getEmail());

        if ($existUser != null){
            throw new AlreadyExistsException("User exist with this email!");
        }

        return $this->userRepository->saveUser($user);
    }

    /**
     * @return array<User>
     */
    public function getAllUser(): array {
        return$this->userRepository->getAllUser();
    }
}