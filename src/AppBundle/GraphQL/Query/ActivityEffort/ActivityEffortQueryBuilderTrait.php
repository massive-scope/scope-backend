<?php

namespace AppBundle\GraphQL\Query\ActivityEffort;

use Doctrine\ORM\QueryBuilder;
use Youshido\GraphQL\Parser\Ast\Query;

trait ActivityEffortQueryBuilderTrait
{
    public function addActivityEffortFields(array $fields, QueryBuilder $queryBuilder, $alias = 'entity')
    {
        foreach ($fields as $index => $field) {
            if ($field instanceof Query) {
                continue;
            }

            if ($index === 0) {
                $queryBuilder->select($alias . '.' . $field->getName());

                continue;
            }

            $queryBuilder->addSelect($alias . '.' . $field->getName());
        }

        return $queryBuilder;
    }
}