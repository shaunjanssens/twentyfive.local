<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Organisation;
use AppBundle\Entity\User;
use DateTime;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory as Faker;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

/**
 * Class LoadUserData.
 *
 * @author Olivier Parent <olivier.parent@arteveldehs.be>
 * @copyright Copyright © 2016-2017, Artevelde University College Ghent
 */
class LoadOrganisationData extends AbstractFixture implements OrderedFixtureInterface
{

    const COUNT = 5;

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 1; // The order in which fixture(s) will be loaded.
    }

    public function load(ObjectManager $em)
    {
        $locale = 'nl_BE';
        $faker = Faker::create($locale);

        // Fake users.
        for ($count = 0; $count < self::COUNT; ++$count) {
            $organisation = new Organisation();
            $em->persist($organisation); // Manage Entity for persistence.
            $organisation
                ->setName($faker->company())
                ->setDescription($faker->paragraph())
            ;
            $this->addReference("TestOrganisation-${count}", $organisation); // Reference for the next Data Fixture(s).
        }

        $em->flush(); // Persist all managed Entities.
    }
}