<?php

namespace App\Mapper;

use App\ApiResource\UserDto;
use App\Entity\User;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class UserMapper
{
    private Serializer $serializer;

    public function __construct()
    {
        $this->serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
    }

    /**
     * @throws ExceptionInterface
     */
    public function dtoToEntity(UserDto $userDto) : User
    {
        $json = $this->serializer->serialize($userDto, 'json');
        return $this->serializer->deserialize($json, User::class, 'json');
    }

    /**
     * @param User $user
     * @return UserDto
     */
    public function entityToDto(User $user) : UserDto
    {
        $json = $this->serializer->serialize($user, 'json');
        return $this->serializer->deserialize($json, UserDto::class, 'json');
    }
}