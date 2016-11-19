<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Task;
use AppBundle\Entity\TaskCategory;
use AppBundle\Entity\Team;
use AppBundle\Entity\Role;
use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Collections\ArrayCollection;
use Faker\Factory as Faker;


class LoadTaskData extends AbstractFixture implements OrderedFixtureInterface
{

    const COUNT = 300;

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 7; // The order in which fixture(s) will be loaded.
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $em)
    {
        $locale = 'nl_BE';
        $faker = Faker::create($locale);

        $allTeams = $em->getRepository(Team::class)->findAll();
        $allUsers = $em->getRepository(User::class)->findAll();
        $allCategories = $em->getRepository(TaskCategory::class)->findAll();

        // Fake users.
        for ($i = 0; $i < self::COUNT; ++$i) {
            $team = $faker->randomElement($allTeams);
            $user = $faker->randomElement($allUsers);
            $category = $faker->randomElement($allCategories);

            $data = new Task();
            $em->persist($data); // Manage Entity for persistence.
            $data
                ->setName($faker->sentence())
                ->setDescription($faker->sentences(3, true))
                ->setDeadline($faker->dateTimeBetween('-1 week', '+1 month'))
                ->setStatus($faker->numberBetween(1, 3))
                ->setUser($user)
                ->setTaskCategory($category)
                ->setTeam($team)
            ;
            $this->addReference("TestTask-${i}", $data); // Reference for the next Data Fixture(s).
        }

        $em->flush(); // Persist all managed Entities.
    }
}