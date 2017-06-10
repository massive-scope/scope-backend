<?php

namespace AppBundle\CQRS\Model\Project\Command;

use AppBundle\CQRS\Model\Project\ProjectId;
use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadConstructable;
use Prooph\Common\Messaging\PayloadTrait;
use Rhumsaa\Uuid\Uuid;

class CreateProject extends Command implements PayloadConstructable
{
    use PayloadTrait;

    public static function withData($title)
    {
        return new self(
            [
                'project_id' => Uuid::uuid4()->toString(),
                'title' => $title,
            ]
        );
    }
    /**
     * @return ProjectId
     */
    public function getProjectId()
    {
        return ProjectId::fromString($this->payload['project_id']);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->payload['title'];
    }
}
