<?php

namespace AppBundle\GraphQL\Type;

use AppBundle\GraphQL\Query\ActivityEffort\ActivityEffortsField;
use AppBundle\GraphQL\Query\Package\PackageField;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class ActivityType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(
            [
                'id' => new NonNullType(new IdType()),
                'title' => new StringType(),
                'description' => new StringType(),
                'package' => new PackageField(false),
                'activityEfforts' => new ActivityEffortsField(),
                '__typename' => [
                    'type' => new StringType(),
                    'resolver' => function () {
                        return 'activity';
                    },
                ],
            ]
        );
    }
}
