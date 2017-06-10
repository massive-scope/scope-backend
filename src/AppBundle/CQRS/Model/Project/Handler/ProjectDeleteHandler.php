<?php

namespace AppBundle\CQRS\Model\Project\Handler;

use AppBundle\CQRS\Model\Project\Command\CreateProject;
use AppBundle\CQRS\Model\Project\Command\DeleteProject;
use AppBundle\CQRS\Model\Project\Project;
use AppBundle\CQRS\Model\Project\ProjectCollectionInterface;

class ProjectDeleteHandler
{
    /**
     * @var ProjectCollectionInterface
     */
    private $projectCollection;

    /**
     * @param ProjectCollectionInterface $projectCollection
     */
    public function __construct(ProjectCollectionInterface $projectCollection)
    {
        $this->projectCollection = $projectCollection;
    }
    /**
     * @param DeleteProject $command
     */
    public function __invoke(DeleteProject $command)
    {
        $project = $this->projectCollection->get($command->getProjectId());
        $project->delete();
    }
}
