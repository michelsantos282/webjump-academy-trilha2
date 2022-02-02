<?php
/*
 * PHP version 7
 *
 * @author      Webjump Core Team <dev@webjump.com.br>
 * @copyright   2020 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 * @link        http://www.webjump.com.br
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * First cli command
 */
class FirstCommand extends Command
{

    const NAME = 'name';

    /**
     * @inheriDoc
     */
    public function configure()
    {
        $this->setName("my:first:command");
        $this->setDescription("This is my first CLI command");
        $this->addOption(
            self::NAME,
            null,
            InputOption::VALUE_REQUIRED,
            'Name'
        );
        parent::configure();
    }

    /**
     * Execute the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if($name = $input->getOption(self::NAME)) {
            $output->writeln('<info>Hello World! `' . $name . '`</info>');
        }

        $output->writeln('<info>Command Executed Successfully.</info>');
    }
}
