<?php

namespace App\Console\Commands\WeSeed;

use Orangehill\Iseed\IseedCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class SeedCommand extends IseedCommand
{
    /**
     * App\WeSeed\Seed;
     */
    protected $seed;
    
    /**
     * The name of the console command.
     *
     * @var string
     */
    protected $name = 'weseed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expansion over iseed';
    
    /**
     * The primary key Ids to include.
     * Results in a where Id IN ()
     */
    protected $includeIds = [];
    
    /**
     * The primary key Ids to exclude.
     * Results in a where Id NOT IN ()
     */
    protected $excludeIds = [];
    
    /**
     * Adds a where statement to the final query
     * TODO: Determine and document exact sytax
     */
    protected $where = [];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        \App\WeSeed\Seed $seed
    ) {

        $this->seed = $seed;
        parent::__construct();
    }

    public function setOptions()
    {
        $this->includeIds = $this->option("includeIds");
        $this->excludeIds = $this->option("excludeIds");
        $this->where = $this->option("where");
    }
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->setOptions();
        print_r(
        [$this->excludeIds,
        $this->includeIds,
        $this->where
        ]
        );
        exit;
        echo "handle";
        exit;
    }
    
    public function getOptions()
    {
        return array_merge(
            parent::getOptions(),
            [
                ['includeIds', null, InputOption::VALUE_OPTIONAL, 'IncludeIds', null],
                ['excludeIds', null, InputOption::VALUE_OPTIONAL, 'ExcludeIds', null],
                ['where', null, InputOption::VALUE_OPTIONAL, 'where', null],
            ]
        );
    }
}
