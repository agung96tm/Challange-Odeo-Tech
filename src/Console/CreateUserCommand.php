<?php
namespace App\Console;

require "bootstrap.php";

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use Illuminate\Database\Capsule\Manager as Capsule;

use App\Databases\Models\User;
use App\Core\Random;

/**
 * Command.
 */
class CreateUserCommand extends Command
{
    protected function configure()
    {
        parent::configure();
        $this->setName('create:user');
        $this->setDescription('create new user');

        $this->addArgument('email', InputArgument::REQUIRED, 'user email');
        $this->addArgument('name', InputArgument::OPTIONAL, 'user name');
        $this->addArgument('password', InputArgument::OPTIONAL, 'user password');
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
        $output->writeln([
            'Create new User',
            '============',
        ]);
        
        $email = $input->getArgument('email');
        $name = $input->getArgument('name');
        $password = $input->getArgument('password');

        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->set_password($password);
        $user->save();

        $output->writeln('Name: '.$name);
        $output->writeln('Email: '.$email);
        $output->writeln('Password: '.$password);

        $output->writeln([
            '============',
        ]);

        return Command::SUCCESS;
    }
}