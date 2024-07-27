<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class CreateDatabase extends Command
{
    protected $signature = 'db:create';
    protected $description = 'Create the database if it does not exist';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $config = Config::get('database.connections.mysql');
        $database = $config['database'];

        try {
            // Create the database if it does not exist
            $pdo = new \PDO("mysql:host={$config['host']};port={$config['port']}", $config['username'], $config['password']);
            $pdo->exec("CREATE DATABASE IF NOT EXISTS `$database`");

            $this->info('Database created successfully.');
        } catch (\PDOException $e) {
            $this->error('Could not create the database: ' . $e->getMessage());
        }
    }
}
