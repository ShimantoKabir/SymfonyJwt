<?php

namespace App\Repository;

use App\Entity\User;

interface UserRepository
{
    /**
     * @param string $email
     * @return User|null
     */
    function findByEmail(string $email) : ?User;

    /**
     * @param User $user
     * @return User|null
     */
    function saveUser(User $user) : ?User;


    /**
     * @return array<User>
     */
    function getAllUser() : array;
}
