<?php

namespace AppBundle\GraphQL\Type;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
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
                'description' => new StringType(),
            ]
        );
    }
}
