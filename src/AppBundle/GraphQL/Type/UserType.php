<?php

namespace AppBundle\GraphQL\Type;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\FloatType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class UserType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(
            [
                'id' => new NonNullType(new IdType()),
                'login' => new StringType(),
                'internalHourlyRate' => new FloatType(),
                'externalHourlyRate' => new FloatType(),
                'lastLogin' => new DateTimeType(),
                'locked' => new BooleanType(),
                'passwordForgotten' => new BooleanType(),
                '__typename' => [
                    'type' => new StringType(),
                    'resolver' => function () {
                        return 'user';
                    },
                ],
                // TODO language
                // TODO contact
            ]
        );
    }
}
