<?php

namespace AppBundle\CQRS\Model\Project\Handler;

use AppBundle\CQRS\Model\Project\Command\CreateProject;
use AppBundle\CQRS\Model\Project\Project;
use AppBundle\CQRS\Model\Project\ProjectCollectionInterface;

class ProjectCreateHandler
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
     * @param CreateProject $command
     */
    public function __invoke(CreateProject $command)
    {
        $this->projectCollection->add(Project::create($command->getProjectId(), $command->getTitle()));
    }
}
