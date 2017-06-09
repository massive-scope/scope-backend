<?php

namespace AppBundle\GraphQL\Type;

use AppBundle\GraphQL\Query\Package\PackagesField;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\FloatType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class ProjectType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(
            [
                'id' => new NonNullType(new IdType()),
                'title' => new StringType(),
                'budget' => new FloatType(),
                'hours' => new FloatType(),
                'startDate' => new DateTimeType(),
                'endDate' => new DateTimeType(),
                'packages' => new PackagesField(false),
                '__typename' => [
                    'type' => new  StringType(),
                    'resolver' => function () {
                        return 'Project';
                    },
                ],
            ]
        );
    }
}
