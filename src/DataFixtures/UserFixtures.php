<?php

namespace App\DataFixtures;

use App\Entity\Interfaces\IRole;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements IRole
{
    private $userPasswordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user->setEmail("admin@admin.fr");
        $user->setNom("admin");
        $user->setPrenom("nimda");
        $user->setDatecreation(new \DateTime("now"));
        $user->addRole(self::ROLE_ADMIN);
        $user->setPassword($this->userPasswordHasher->hashpassword(
            $user,
            "coucou"));
        $manager->persist($user);

        $user = new User();
        $user->setEmail("raiky@coco.fr");
        $user->setNom("raiky");
        $user->setPrenom("coco");
        $user->setDatecreation(new \DateTime("now"));
        $user->addRole(self::ROLE_MEMBER);
        $user->setPassword($this->userPasswordHasher->hashpassword(
            $user,
            "coucou"

        ));

        $manager->persist($user);
        $manager->flush();
    }
}
