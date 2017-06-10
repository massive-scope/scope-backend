<?php

namespace AppBundle\CQRS\Model\Project\Command;

use AppBundle\CQRS\Model\Project\ProjectId;
use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadConstructable;
use Prooph\Common\Messaging\PayloadTrait;

class DeleteProject extends Command implements PayloadConstructable
{
    use PayloadTrait;

    public static function withData($projectId)
    {
        return new self(
            [
                'project_id' => $projectId,
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
}
