<?php

namespace AppBundle\CQRS\Model\Project\Event;

use AppBundle\CQRS\Model\Project\ProjectId;
use Prooph\EventSourcing\AggregateChanged;

class ProjectWasCreated extends AggregateChanged
{
    /**
     * @var ProjectId
     */
    private $projectId;

    /**
     * @var string
     */
    private $title;

    public static function withData(ProjectId $projectId, $title)
    {
        $event = self::occur(
            $projectId->toString(),
            [
                'title' => $title,
            ]
        );

        $event->projectId = $projectId;
        $event->title = $title;

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

    /**
     * Returns title.
     *
     * @return string
     */
    public function getTitle()
    {
        if ($this->title === null) {
            $this->title = $this->payload['title'];
        }

        return $this->title;
    }
}
