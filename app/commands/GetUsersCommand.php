<?php
/**
 * Created by PhpStorm.
 * User: denisov
 * Date: 06.05.2018
 * Time: 19:03
 */

namespace app\commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Unirest\Request;


class GetUsersCommand extends Command
{
    protected function configure()
    {
        $this->setName('run')->setDescription('Update user data from github api')->setHelp('Create user or update existing user');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $output->writeln([
            'Getting users from github',
            '============',
            '',
        ]);


        $response = Request::get('https://api.github.com/users');
        if ($response->code == 200) {

            $users_data = json_decode($response->raw_body);
            if ($users_data && is_array($users_data)) {

                foreach ($users_data as $user) {

                    $output->write($user->id);
                    $output->write(" | ");
                    $output->writeln($user->login);

                }
            }
        }

    }
}