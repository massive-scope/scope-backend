<?php

namespace AppBundle\GraphQL\Type;

use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class ActivitiesType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(
            [
                'total' => new IntType(),
                'items' => new ListType(new ActivityType()),
                '__typename' => [
                    'type' => new  StringType(),
                    'resolver' => function () {
                        return 'Activities';
                    },
                ],
            ]
        );
    }
}
