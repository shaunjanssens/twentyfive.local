<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Team;
use AppBundle\Entity\Role;
use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Collections\ArrayCollection;
use Faker\Factory as Faker;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{

    const COUNT = 100;

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 3; // The order in which fixture(s) will be loaded.
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $em)
    {
        $locale = 'nl_BE';
        $faker = Faker::create($locale);

        $allTeams = $em->getRepository(Team::class)->findAll();

        // Fake users.
        for ($i = 0; $i < self::COUNT; ++$i) {
            $team = $faker->randomElement($allTeams);

            $data = new User();
            $em->persist($data); // Manage Entity for persistence.
            $data
                ->setEmail($faker->companyEmail())
                ->setPassword($faker->password())
                ->setFirstName($faker->firstName)
                ->setLastName($faker->lastName)
                ->setDisplayname($faker->userName)
                ->setRoleId($faker->numberBetween(1, 2))
                ->addTeamTeam($team)
                ->setLastLogin($faker->dateTimeBetween('-1 month'))
                ->setEnabled($faker->boolean(90))
            ;
            $this->addReference("TestUser-${i}", $data); // Reference for the next Data Fixture(s).
        }

        $em->flush(); // Persist all managed Entities.
    }
}