<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Team;
use AppBundle\Entity\Role;
use AppBundle\Entity\User;
use AppBundle\Entity\Weblink;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Collections\ArrayCollection;
use Faker\Factory as Faker;


class LoadWeblinkData extends AbstractFixture implements OrderedFixtureInterface
{

    const COUNT = 100;

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 4; // The order in which fixture(s) will be loaded.
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $em)
    {
        $locale = 'nl_BE';
        $faker = Faker::create($locale);

        $allTeams = $em->getRepository(Team::class)->findAll();

        for ($i = 0; $i < self::COUNT; ++$i) {
            $team = $faker->randomElement($allTeams);

            $data = new Weblink();
            $em->persist($data); // Manage Entity for persistence.
            $data
                ->setName($faker->domainName)
                ->setDescription($faker->paragraph())
                ->setUrl($faker->url)
                ->addTeamTeam($team)
            ;
            $this->addReference("TestWeblink-${i}", $data); // Reference for the next Data Fixture(s).
        }

        $em->flush(); // Persist all managed Entities.
    }
}