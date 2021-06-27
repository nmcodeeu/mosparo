<?php

namespace Mosparo\Command;

use Mosparo\Helper\CleanupHelper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CleanupDatabaseCommand extends Command
{
    protected static $defaultName = 'mosparo:cleanup-database';

    protected $cleanupHelper;

    public function __construct(string $name = null, CleanupHelper $cleanupHelper)
    {
        parent::__construct($name);

        $this->cleanupHelper = $cleanupHelper;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Cleanups the database.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->cleanupHelper->cleanup(true);

        return 0;
    }
}