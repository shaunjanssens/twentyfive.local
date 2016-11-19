<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ArteveldeDbBackupCommand.
 *
 * Use:
 * $ console artevelde:db:backup
 *
 * @author Olivier Parent <olivier.parent@arteveldehs.be>
 * @copyright Copyright © 2016-2017, Artevelde University College Ghent
 */
class ArteveldeDbBackupCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('artevelde:db:backup')
            ->setDescription('Backups the database by dumping SQL file')
        ;
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();

        // Get variables from `app/config/parameters.yml`
        $dbName = $container->getParameter('database_name');
        $dbUsername = $container->getParameter('database_user');
        $dbPassword = $container->getParameter('database_password');
        $dbDumpPath = $container->getParameter('database_dump_path');

        // Create folder(s)
        $command = "mkdir -p ${dbDumpPath}";
        exec($command);

        // Create SQL database dump
        $command = "MYSQL_PWD=${dbPassword} mysqldump --user=${dbUsername} --databases ${dbName} > ${dbDumpPath}/latest.sql";
        exec($command);

        // Gzip and timestamp created SQL database dump
        $command = "gzip -cr ${dbDumpPath}/latest.sql > ${dbDumpPath}/\$(date +\"%Y-%m-%d_%H%M%S\").sql.gz";
        exec($command);

        $output->writeln("Backup for database `${dbName}` stored!");
    }
}
