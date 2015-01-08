<?php

namespace Edgji\Bundle\SyliusQuickStartBundle\Command;

use RuntimeException;
use Sylius\Bundle\InstallerBundle\Command\InstallCommand as BaseInstallCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InstallCommand extends BaseInstallCommand
{
    protected function configure()
    {
        $this
            ->setName('sylius:quickstart')
            ->setDescription('Sylius quick start.')
        ;
    }

    protected function setupDatabase(InputInterface $input, OutputInterface $output)
    {
        if ($this->getHelperSet()->get('dialog')->askConfirmation($output, '<question>Create database (Y/N)?</question>', false)) {
            $this->runCommand('doctrine:database:create', $input, $output);
            $this->runCommand('doctrine:schema:create', $input, $output);
        } else {
            if ($this->getHelperSet()->get('dialog')->askConfirmation($output, '<question>Drop existing schema (Y/N)?</question>', false)) {
                $forceInput = new StringInput('doctrine:schema:drop --force');
                $this->runCommand('doctrine:schema:drop', $forceInput, $output);
                $this->runCommand('doctrine:schema:create', $input, $output);
            }
        }

        $this
            ->runCommand('doctrine:phpcr:repository:init', $input, $output)
            ->runCommand('assets:install', $input, $output)
            ->runCommand('assetic:dump', $input, $output)
        ;
    }

    protected function setupFixtures(InputInterface $input, OutputInterface $output)
    {
        $doctrineConfig = $this->getContainer()->get('doctrine.orm.entity_manager')->getConnection()->getConfiguration();
        $logger = $doctrineConfig->getSQLLogger();
        $doctrineConfig->setSQLLogger(null);
        $fixturesInput = new ArrayInput(['command' => 'doctrine:fixtures:load', '--fixtures' => realpath(__DIR__.'/../')]);
        $fixturesPhpCrInput = new ArrayInput(['command' => 'doctrine:phpcr:fixtures:load', '--fixtures' => dirname((new \ReflectionClass('Sylius\\Bundle\\FixturesBundle\\DataFixtures\\DataFixture'))->getFileName()).'/PHPCR']);
        $this
            ->runCommand('doctrine:fixtures:load', $fixturesInput, $output)
            ->runCommand('doctrine:phpcr:fixtures:load', $fixturesPhpCrInput, $output)
        ;
        $doctrineConfig->setSQLLogger($logger);
    }

    protected function runCommand($command, InputInterface $input, OutputInterface $output)
    {
        $this
            ->getApplication()
            ->find($command)
            ->run($input, $output)
        ;

        return $this;
    }
}
