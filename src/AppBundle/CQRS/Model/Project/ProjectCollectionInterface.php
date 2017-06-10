<?php

namespace AppBundle\CQRS\Model\Project;

interface ProjectCollectionInterface
{
    /**
     * @param Project $project
     *
     * @return void
     */
    public function add(Project $project);

    /**
     * @param ProjectId $projectId
     *
     * @return Project
     */
    public function get(ProjectId $projectId);
}
