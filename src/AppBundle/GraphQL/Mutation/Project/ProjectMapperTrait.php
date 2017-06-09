<?php

namespace AppBundle\GraphQL\Mutation\Project;

use AppBundle\Entity\Project;

trait ProjectMapperTrait
{
    public function mapProject(array $data, Project $project)
    {
        $project->setTitle($data['title']);

        return $project;
    }
}
