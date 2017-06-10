<?php

namespace AppBundle\CQRS\Model\Project;

use AppBundle\CQRS\Model\Project\Event\ProjectWasCreated;
use AppBundle\CQRS\Model\Project\Event\ProjectWasDeleted;
use Assert\Assertion;
use Prooph\EventSourcing\AggregateRoot;

class Project extends AggregateRoot
{
    /**
     * @var bool
     */
    private $deleted = false;

    /**
     * @var ProjectId
     */
    private $projectId;

    /**
     * @var string
     */
    private $title;

    public static function create(ProjectId $projectId, $title)
    {
        $self = new self();

        Assertion::string($title);
        Assertion::notEmpty($title);

        $self->recordThat(ProjectWasCreated::withData($projectId, $title));

        return $self;
    }

    /**
     * Returns projectId.
     *
     * @return ProjectId
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * Returns title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function delete()
    {
        self::recordThat(ProjectWasDeleted::withData($this->projectId));
    }

    protected function aggregateId()
    {
        return $this->projectId->toString();
    }

    public function whenProjectWasCreated(ProjectWasCreated $event)
    {
        $this->projectId = $event->getProjectId();
        $this->title = $event->getTitle();
    }

    public function whenProjectWasDeleted(ProjectWasDeleted $event)
    {
        $this->deleted = true;
    }
}
