<?php
/**
 * Created by PhpStorm.
 * User: denisov
 * Date: 06.05.2018
 * Time: 19:03
 */

namespace app\commands;

use app\components\DB;
use app\components\User;
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

                User::setDB();
                $updated = 0;
                $created = 0;
                $no_changes = 0;

                foreach ($users_data as $user_data) {

                    if (User::find($user_data->id)) {

                        if (User::update($user_data->id, $user_data->login)) {
                            $output->write("User updated: ");
                            $updated++;
                        } else $no_changes++;

                    } else {

                        if (User::create($user_data->id, $user_data->login)) {
                            $output->write("User created : ");
                            $created++;
                        } else {
                            $output->write("ERROR USER CREATING: ");
                        }
                    }
                    $output->write($user_data->id);
                    $output->write(" | ");
                    $output->writeln($user_data->login);
                }
                $output->writeln("RESULTS. Created=$created, updated=$updated, no changes=$no_changes ");
            }
        } else {
            
            $output->write("Git hub connection failed");
        }
    }
}