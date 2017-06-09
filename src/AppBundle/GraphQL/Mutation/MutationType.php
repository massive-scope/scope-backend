<?php

namespace AppBundle\GraphQL\Mutation;

use AppBundle\GraphQL\Mutation\Activity\CreateActivityField;
use AppBundle\GraphQL\Mutation\Activity\DeleteActivityField;
use AppBundle\GraphQL\Mutation\Activity\UpdateActivityField;
use AppBundle\GraphQL\Mutation\ActivityEffort\CreateActivityEffortField;
use AppBundle\GraphQL\Mutation\ActivityEffort\DeleteActivityEffortField;
use AppBundle\GraphQL\Mutation\ActivityEffort\UpdateActivityEffortField;
use AppBundle\GraphQL\Mutation\Package\CreatePackageField;
use AppBundle\GraphQL\Mutation\Package\DeletePackageField;
use AppBundle\GraphQL\Mutation\Package\UpdatePackageField;
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
                // projects
                new CreateProjectField(),
                new UpdateProjectField(),
                new DeleteProjectField(),

                // packages
                new CreatePackageField(),
                new DeletePackageField(),
                new UpdatePackageField(),

                // activities
                new CreateActivityField(),
                new DeleteActivityField(),
                new UpdateActivityField(),

                // activityEfforts
                new CreateActivityEffortField(),
                new DeleteActivityEffortField(),
                new UpdateActivityEffortField(),
            ]
        );
    }
}
