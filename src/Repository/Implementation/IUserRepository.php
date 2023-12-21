<?php

namespace App\Repository\Implementation;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class IUserRepository implements UserRepository
{
    private EntityManagerInterface $entityManager;
    private EntityRepository $entityRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->entityRepository = $this->entityManager->getRepository(User::class);
    }

    /**
     * @param string $email
     * @return User|null
     */
    function findByEmail(string $email): ?User
    {
        return $this->entityRepository->findOneBy([
            'email' => $email,
        ]);
    }

    /**
     * @param User $user
     * @return User
     */
    function saveUser(User $user): User
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        return $user;
    }

    /**
     * @return array<User>
     */
    function getAllUser(): array
    {
        return $this->entityRepository->findAll();
    }
}