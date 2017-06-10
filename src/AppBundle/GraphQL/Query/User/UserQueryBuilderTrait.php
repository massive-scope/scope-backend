<?php

namespace AppBundle\GraphQL\Query\User;

use Doctrine\ORM\QueryBuilder;
use Youshido\GraphQL\Parser\Ast\Query;

trait UserQueryBuilderTrait
{
    public function addUserFields(array $fields, QueryBuilder $queryBuilder, $alias = 'entity')
    {
        foreach ($fields as $index => $field) {
            if ($field instanceof Query || $field->getName() === '__typename') {
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
