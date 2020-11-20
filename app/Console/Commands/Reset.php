<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Reset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $commands = [
            'migrate:reset',
            'migrate',
            'db:seed',
        ];

        $this->info('in progress...');

        $this->perform($commands);

        $this->info(PHP_EOL . 'done');    
    }

    protected function perform(array $commands)
    {
        $bar = $this->output->createProgressBar(count($commands));

        $bar->start();

        foreach ($commands as $command) {

            $this->callSilent($command);

            $bar->advance();
        }

        $bar->finish();
    }
}
