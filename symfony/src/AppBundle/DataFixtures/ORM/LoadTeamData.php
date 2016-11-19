<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Organisation;
use AppBundle\Entity\Team;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Collections\ArrayCollection;
use Faker\Factory as Faker;


class LoadTeamData extends AbstractFixture implements OrderedFixtureInterface
{

    const COUNT = 10;

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 2; // The order in which fixture(s) will be loaded.
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $em)
    {
        $locale = 'nl_BE';
        $faker = Faker::create($locale);

        $allOrganisation = $em->getRepository(Organisation::class)->findAll();

        // Fake users.
        for ($i = 0; $i < self::COUNT; ++$i) {
            $organisation = $faker->randomElement($allOrganisation);

            $data = new Team();
            $em->persist($data); // Manage Entity for persistence.
            $data
                ->setName($faker->company())
                ->setDescription($faker->paragraph())
                ->setOrganisation($organisation)
            ;
            $this->addReference("TestTeam-${i}", $data); // Reference for the next Data Fixture(s).
        }

        $em->flush(); // Persist all managed Entities.
    }
}