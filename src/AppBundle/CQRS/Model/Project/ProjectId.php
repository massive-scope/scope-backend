<?php

namespace AppBundle\CQRS\Model\Project;

use Rhumsaa\Uuid\Uuid;

class ProjectId
{
    /**
     * @var Uuid
     */
    private $uuid;

    /**
     * @return ProjectId
     */
    public static function generate()
    {
        return new self(Uuid::uuid4());
    }

    /**
     * @param $ProjectId
     *
     * @return ProjectId
     */
    public static function fromString($ProjectId)
    {
        return new self(Uuid::fromString($ProjectId));
    }

    /**
     * @param Uuid $uuid
     */
    private function __construct(Uuid $uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->uuid->toString();
    }

    /**
     * @param ProjectId $other
     *
     * @return bool
     */
    public function sameValueAs(ProjectId $other)
    {
        return $this->toString() === $other->toString();
    }
}
