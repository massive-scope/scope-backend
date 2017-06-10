<?php

namespace AppBundle\GraphQL\Type;

use AppBundle\GraphQL\Query\User\UserField;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class UserTokenType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(
            [
                'id' => new NonNullType(new IdType()),
                'name' => new StringType(),
                'token' => new StringType(),
                'date' => new DateTimeType(),
                'user' => new UserField(false),
                '__typename' => [
                    'type' => new StringType(),
                    'resolver' => function () {
                        return 'userToken';
                    },
                ],
            ]
        );
    }
}
