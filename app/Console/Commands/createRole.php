<?php

namespace App\Console\Commands;

use App\Roles;
use Illuminate\Console\Command;

class createRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:role {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command create new role in DB';

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
     * @return mixed
     */
    public function handle()
    {
        $name = $this->option('name');
        $model = new Roles();
        $model->name = $name;
        $model->save();
        return $model;
    }
}
