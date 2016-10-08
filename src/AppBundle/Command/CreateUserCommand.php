<?php

namespace AppBundle\Command;

use CoreDomain\DTO\User\UserRegisterDTO;
use CoreDomain\Exception\ValidationException;
use CoreDomain\Model\User\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class CreateUserCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('user:create')
            ->setDescription('Create a user')
            ->setDefinition(array(
                new InputArgument('email', InputArgument::REQUIRED, 'Email'),
                new InputArgument('password', InputArgument::REQUIRED, 'Password'),
                new InputArgument('roles', InputArgument::IS_ARRAY | InputArgument::OPTIONAL, 'Roles (separate multiple roles with a space)'),
            ))
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $userDTO = new UserRegisterDTO(
            $input->getArgument('email'),
            $input->getArgument('password'),
            $input->getArgument('roles')
        );
        try {
            $this->getContainer()->get('app.managers.user.user')->register($userDTO);
            $output->writeln('<info>User created!</info>');
        } catch (ValidationException $e) {
            $output->writeln('User not created. Errors:');
            foreach ($e->getErrors() as $key => $message) {
                $output->writeln("<error>$key: $message</error>");
            }
        }
    }

    protected function interact(InputInterface $input, OutputInterface $output)
    {
        $questions = array();
        if (!$input->getArgument('email')) {
            $question = new Question('Please choose a email:');
            $question->setValidator(function($email) {
                if (empty($email)) {
                    throw new \Exception('Email can not be empty');
                }
                return $email;
            });
            $questions['email'] = $question;
        }

        if (!$input->getArgument('password')) {
            $question = new Question('Please choose a password:');
            $question->setValidator(function($password) {
                if (empty($password)) {
                    throw new \Exception('Password can not be empty');
                }
                return $password;
            });
            $question->setHidden(true);
            $questions['password'] = $question;
        }

        foreach ($questions as $name => $question) {
            $answer = $this->getHelper('question')->ask($input, $output, $question);
            $input->setArgument($name, $answer);
        }

        $role = $this->getHelper('dialog')->select(
            $output,
            'Please select user role',
            User::getAvailableRoles(),
            null
        );
        $input->setArgument('roles', [User::getAvailableRoles()[$role]]);
    }
}