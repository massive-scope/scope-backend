<?php

namespace AppBundle\GraphQL\Query;

use AppBundle\GraphQL\Query\Project\ProjectField;
use AppBundle\GraphQL\Query\Project\ProjectsField;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class QueryType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(
            [
                new ProjectsField(),
                new ProjectField(),
            ]
        );
    }
}
