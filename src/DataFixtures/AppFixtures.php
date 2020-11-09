<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setName('Bob Labla');
        $user1->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation');
        $user1->setImageURL('https://randomuser.me/api/portraits/men/42.jpg');

        $manager->persist($user1);

        $user2 = new User();
        $user2->setName('Philip J. Fry');
        $user2->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation');
        $user2->setImageURL('https://randomuser.me/api/portraits/men/89.jpg');

        $manager->persist($user2);

        $manager->flush();

        $post1 = new Post();
        $post1->setUser($user1);
        $post1->setBody('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation');
        $post1->setTitle('post 1');

        $manager->persist($post1);

        $post2 = new Post();
        $post2->setUser($user2);
        $post2->setBody('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation');
        $post2->setTitle('post 2');

        $manager->persist($post2);

        $manager->flush();
    }
}
