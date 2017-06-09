<?php

namespace AppBundle\GraphQL\Type;

use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;

class ActivitiesType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(
            [
                'total' => new IntType(),
                'items' => new ListType(new ActivityType()),
            ]
        );
    }
}
