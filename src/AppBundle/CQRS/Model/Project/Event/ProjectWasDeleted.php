<?php

namespace AppBundle\CQRS\Model\Project\Event;

use AppBundle\CQRS\Model\Project\ProjectId;
use Prooph\EventSourcing\AggregateChanged;

class ProjectWasDeleted extends AggregateChanged
{
    /**
     * @var ProjectId
     */
    private $projectId;

    public static function withData(ProjectId $projectId)
    {
        $event = self::occur(
            $projectId->toString()
        );

        $event->projectId = $projectId;

        return $event;
    }

    /**
     * Returns projectId.
     *
     * @return ProjectId
     */
    public function getProjectId()
    {
        if ($this->projectId === null) {
            $this->projectId = ProjectId::fromString($this->aggregateId());
        }

        return $this->projectId;
    }
}
