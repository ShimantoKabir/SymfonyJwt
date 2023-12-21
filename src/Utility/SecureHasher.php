<?php

namespace App\Utility;

use Symfony\Component\PasswordHasher\Hasher\CheckPasswordLengthTrait;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;

/**
 *
 */
class SecureHasher implements PasswordHasherInterface
{

    use CheckPasswordLengthTrait;

    /**
     * @param string $plainPassword
     * @return string
     */
    public function hash(#[\SensitiveParameter] string $plainPassword): string
    {
        $factory = new PasswordHasherFactory([
            'common' => ['algorithm' => 'bcrypt']
        ]);

        $hasher = $factory->getPasswordHasher('common');
        return $hasher->hash($plainPassword);
    }

    /**
     * @param string $hashedPassword
     * @param string $plainPassword
     * @return bool
     */
    public function verify(string $hashedPassword, #[\SensitiveParameter] string $plainPassword): bool
    {
        if ('' === $plainPassword || $this->isPasswordTooLong($plainPassword)) {
            return false;
        }

        $factory = new PasswordHasherFactory([
            'common' => ['algorithm' => 'bcrypt']
        ]);

        $hasher = $factory->getPasswordHasher('common');
        return $hasher->verify($hashedPassword, 'plain');
    }

    /**
     * @param string $hashedPassword
     * @return bool
     */
    public function needsRehash(string $hashedPassword): bool
    {
        return false;
    }
}