<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Task;
use AppBundle\Entity\TaskCategory;
use AppBundle\Entity\Team;
use AppBundle\Entity\Role;
use AppBundle\Entity\Timer;
use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Collections\ArrayCollection;
use Faker\Factory as Faker;


class LoadTimerData extends AbstractFixture implements OrderedFixtureInterface
{

    const COUNT = 50;

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 8; // The order in which fixture(s) will be loaded.
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $em)
    {
        $locale = 'nl_BE';
        $faker = Faker::create($locale);

        $allUsers = $em->getRepository(User::class)->findAll();
        $allTasks = $em->getRepository(Task::class)->findAll();

        $i = 0;

        foreach ($allUsers as $user) {
            $task = $faker->randomElement($allTasks);
            $user = $faker->randomElement($allUsers);

            $data = new Timer();
            $em->persist($data); // Manage Entity for persistence.
            $data
                ->setLastTime($faker->numberBetween(0, 1500))
                ->setMaxTime(1500)
                ->setLastRound($faker->numberBetween(1, 12))
                ->setMaxRound(12)
                ->setUser($user)
                ->setTask($task)
            ;
            $this->addReference("TestTimer-${i}", $data); // Reference for the next Data Fixture(s).

            $i++;
        }

        $em->flush(); // Persist all managed Entities.
    }
}