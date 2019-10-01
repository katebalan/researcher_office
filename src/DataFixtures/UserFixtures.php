<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends BaseFixture
{
    private static $users = [
        [
            'username' => 'admin2',
            'firstName' => 'Богдан',
            'secondName' => 'Булах',
            'patronymic' => 'Вікторович',
            'email' => 'admin2@admin.com',
            'birthDate' => '01-01-1990',
            'roles' => ['ROLE_ADMIN']
        ],
        [
            'username' => 'admin',
            'firstName' => 'Катерина',
            'secondName' => 'Балан',
            'patronymic' => 'Григорівна',
            'email' => 'ket11141@gmail.com',
            'birthDate' => '18-11-1996',
            'roles' => ['ROLE_ADMIN']
        ],
        [
            'username' => 'user01',
            'firstName' => 'Олександр',
            'secondName' => 'Безносик',
            'patronymic' => 'Юрійович',
            'email' => 'user01@admin.com',
            'birthDate' => '01-01-1990',
            'roles' => []
        ]
    ];

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    protected function loadData(ObjectManager $manager)
    {
        foreach (self::$users as $user) {
            $entity = new User();
            $entity->setUsername($user['username']);
            $entity->setFirstName($user['firstName']);
            $entity->setSecondName($user['secondName']);
            $entity->setPatronymic($user['patronymic']);
            $entity->setEmail($user['email']);
            $entity->setBirthDate(new \DateTime(sprintf('-%d years', rand(30, 70))));
            $entity->setPassword($this->passwordEncoder->encodePassword($entity, 'admin'));
            $entity->setRoles($user['roles']);
            $manager->persist($entity);
        }

        $manager->flush();
    }
}
