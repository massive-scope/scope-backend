<?php

namespace AppBundle\GraphQL\Query;

use AppBundle\GraphQL\Query\Activity\ActivitiesField;
use AppBundle\GraphQL\Query\Activity\ActivityField;
use AppBundle\GraphQL\Query\ActivityEffort\ActivityEffortField;
use AppBundle\GraphQL\Query\ActivityEffort\ActivityEffortsField;
use AppBundle\GraphQL\Query\Package\PackageField;
use AppBundle\GraphQL\Query\Package\PackagesField;
use AppBundle\GraphQL\Query\Project\ProjectField;
use AppBundle\GraphQL\Query\Project\ProjectsField;
use AppBundle\GraphQL\Query\User\UserField;
use AppBundle\GraphQL\Query\User\UsersField;
use AppBundle\GraphQL\Query\UserToken\UserTokenField;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class QueryType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(
            [
                // projects
                new ProjectsField(),
                new ProjectField(),

                // packages
                new PackagesField(),
                new PackageField(),

                // activities
                new ActivityField(),
                new ActivitiesField(),

                // activityEfforts
                new ActivityEffortField(),
                new ActivityEffortsField(),

                // users
                new UserField(),
                new UsersField(),

                // userTokens
                new UserTokenField(),
            ]
        );
    }
}
