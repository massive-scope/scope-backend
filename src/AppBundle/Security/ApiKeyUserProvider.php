<?php

namespace AppBundle\Security;

use AppBundle\Entity\User;
use AppBundle\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class ApiKeyUserProvider implements UserProviderInterface
{
    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(User::class);
    }

    public function getUsernameForApiKey($apiKey)
    {
        // TODO load username for token

        return 'test';
    }

    public function loadUserByUsername($username)
    {
        return $this->repository->findOneByLogin($username);
    }

    public function refreshUser(UserInterface $user)
    {
        throw $user;
    }

    public function supportsClass($class)
    {
        return User::class === $class;
    }
}
