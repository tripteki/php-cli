<?php

namespace Src\Console\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;

class CommunicationCommand extends Command
{
    /**
     * @return void
     */
    protected function configure()
    {
        $this->
        setName("pipe")->
        setAliases([ "p", ])->
        setDescription("Pipe continuous communication");
        // addArgument()-> //
        // addOption(); //
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $std = fopen("php://stdin", "r");
        $response = null;

        while (! feof($std)) {

            $request = fgets($std);

            if ($request == "true\n") {

                $output->writeln((string) $response = Command::SUCCESS);

            } if ($request == "false\n") {

                $output->writeln((string) $response = Command::FAILURE);
            }
        }

        fclose($std);

        return $response;
    }
};
