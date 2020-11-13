<?php
namespace App\Console;

require "bootstrap.php";

use App\Databases\Migrations\User;
use App\Databases\Migrations\Token;
use App\Databases\Migrations\Mail;

use Illuminate\Database\Capsule\Manager as Capsule;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command.
 */
class MigrateCommand extends Command
{
    /**
     * Configure.
     */
    protected function configure()
    {
        parent::configure();
        $this->setName('migrate');
        $this->setDescription('run migrate');
    }

    /**
     * Execute command.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int integer 0 on success, or an error code
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // migrate
        // be careful, ensure everything have good ordering.
        $output->writeln([
            'Migration',
            '============',
        ]);

        $user = new User();
        $this->dropAndMigrate($user);
        $output->writeln([
            'User Migrate: Finish',
            '---------------------'
        ]);

        $token = new Token();
        $this->dropAndMigrate($token);
        $output->writeln([
            'Token Migrate: Finish',
            '---------------------'
        ]);


        $mail = new Mail();
        $this->dropAndMigrate($mail);
        $output->writeln([
            'Mail Migrate: Finish',
            '---------------------'
        ]);

        $output->writeln('migration success, drop tables if exists');
        return 0;
    }

    protected function dropAndMigrate($migrateFile) {
        $migrateFile->drop();
        $migrateFile->migrate();
    }
}