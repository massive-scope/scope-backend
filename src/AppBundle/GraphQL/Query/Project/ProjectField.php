<?php

namespace AppBundle\GraphQL\Query\Project;

use AppBundle\GraphQL\Type\ProjectType;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class ProjectField extends AbstractContainerAwareField
{
    public function build(FieldConfig $config)
    {
        $this->addArgument('id', new IntType());
        $this->addArgument('title', new StringType());
    }


    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entities = [
            1 => ['id' => 1, 'title' => 'Sulu', 'description' => 'Sulu is awesome!'],
            2 => ['id' => 2, 'title' => 'ZCope', 'description' => 'Zcope is not so awesome!'],
        ];

        if (array_key_exists('id', $args)) {
            return [$entities[$args['id']]];
        }

        if (array_key_exists('title', $args)) {
            $result = [];
            foreach ($entities as $item) {
                if (levenshtein($item['title'], $args['title']) < 2) {
                    $result[] = $item;
                }
            }

            return $result;
        }

        return array_values($entities);
    }

    public function getType()
    {
        return new ListType(new ProjectType());
    }
}
