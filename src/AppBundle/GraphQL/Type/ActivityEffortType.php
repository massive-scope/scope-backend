<?php

namespace AppBundle\GraphQL\Type;

use AppBundle\GraphQL\Query\Activity\ActivityField;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\FloatType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class ActivityEffortType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(
            [
                'id' => new NonNullType(new IdType()),
                'date' => new DateTimeType(),
                'hours' => new FloatType(),
                'description' => new StringType(),
                'activity' => new ActivityField(false),
            ]
        );
    }
}
