<?php

namespace AppBundle\Command;

use AppBundle\CQRS\Model\Project\Command\CreateProject;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateProjectCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('project:create');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->get('prooph_service_bus.todo_command_bus')->dispatch(CreateProject::withData('Test'));
    }
}
