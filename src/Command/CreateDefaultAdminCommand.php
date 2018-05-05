<?php

namespace App\Command;

use App\Document\Device;
use App\Document\Live;
use App\Document\User;
use App\Services\SocketServer;
use App\Services\WebsocketNode;
use Doctrine\Common\EventManager;
use Doctrine\MongoDB\Query\Builder;
use Doctrine\ODM\MongoDB\Cursor;
use Doctrine\ODM\MongoDB\Query\Query;
use FOS\UserBundle\Model\UserManagerInterface;
use Hoa\Socket\Server;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CreateDefaultAdminCommand extends ContainerAwareCommand
{
    protected static $defaultName = 'make:default-admin';
    protected $userManager;

    public function __construct(?string $name = null, UserManagerInterface $userManager)
    {
        parent::__construct($name);
        $this->userManager = $userManager;
    }

    protected function configure()
    {
        $this
            ->setDescription('Creates a default admin user for Symodo')
            ->addOption('username', null, InputOption::VALUE_OPTIONAL, 'The admin username', 'admin')
            ->addOption('email', null, InputOption::VALUE_OPTIONAL, 'The admin email', 'admin@admin.com')
            ->addOption('password', null, InputOption::VALUE_OPTIONAL, 'The admin password', 'admin')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $user = $this->userManager->createUser();
        $user->setUsername($input->getOption('username'));
        $user->setEmail($input->getOption('email'));
        $user->setPlainPassword($input->getOption('password'));
        $user->setEnabled(true);
        $user->setRoles([User::ROLE_ADMIN]);

        $this->userManager->updateUser($user);

        $io->success("Default admin user created with username '{$input->getOption('username')}'");
    }
}
