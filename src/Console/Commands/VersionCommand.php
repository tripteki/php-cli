<?php

namespace Src\Console\Commands;

use Src\Version;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;

class VersionCommand extends Command
{
    /**
     * @return void
     */
    protected function configure()
    {
        $this->
        setName("version")->
        setAliases([ "v", ])->
        setDescription("The version of application");
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $version = (new Version)();

        $output->writeln($version);

        if ($version) {

            return Command::SUCCESS;

        } else {

            return Command::FAILURE;
        }
    }
};
