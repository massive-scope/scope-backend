<?php

namespace AppBundle\CQRS\Infrastructure\Repository;

use AppBundle\CQRS\Model\Project\Project;
use AppBundle\CQRS\Model\Project\ProjectCollectionInterface;
use AppBundle\CQRS\Model\Project\ProjectId;
use Prooph\EventStore\Aggregate\AggregateRepository;

class ProjectCollection extends AggregateRepository implements ProjectCollectionInterface
{
    /**
     * @param Project $project
     *
     * @return void
     */
    public function add(Project $project)
    {
        $this->addAggregateRoot($project);
    }

    /**
     * @param ProjectId $projectId
     *
     * @return Project
     */
    public function get(ProjectId $projectId)
    {
        return $this->getAggregateRoot($projectId->toString());
    }
}
