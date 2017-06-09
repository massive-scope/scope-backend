<?php

namespace AppBundle\GraphQL\Mutation;

use AppBundle\GraphQL\Mutation\Project\CreateProjectField;
use AppBundle\GraphQL\Mutation\Project\DeleteProjectField;
use AppBundle\GraphQL\Mutation\Project\UpdateProjectField;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class MutationType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(
            [
                new CreateProjectField(),
                new UpdateProjectField(),
                new DeleteProjectField(),
            ]
        );
    }
}
