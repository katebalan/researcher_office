<?php

declare(strict_types=1);

namespace App\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class EntityListener
{
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage = null)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function prePersist(LifecycleEventArgs $args): void
    {
        $entity = $args->getEntity();
        if (\property_exists($entity, 'createdBy') && null !== $currentUser = $this->getUser()) {
            $entity->setCreatedBy($currentUser);
            $entity->setUpdatedBy($currentUser);
        }
    }

    public function preUpdate(LifecycleEventArgs $args): void
    {
        $entity = $args->getEntity();
        if (\property_exists($entity, 'updatedBy') && null !== $currentUser = $this->getUser()) {
            $entity->setUpdatedBy($currentUser);
        }
    }

    public function getUser()
    {
        if (!$this->tokenStorage) {
            throw new \LogicException('The SecurityBundle is not registered in your application.');
        }

        if (null === $token = $this->tokenStorage->getToken()) {
            return;
        }

        if (!\is_object($user = $token->getUser())) {
            // e.g. anonymous authentication
            return;
        }

        return $user;
    }
}
