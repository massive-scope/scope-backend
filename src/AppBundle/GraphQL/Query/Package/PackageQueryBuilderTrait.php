<?php

namespace AppBundle\GraphQL\Query\Package;

use Doctrine\ORM\QueryBuilder;

trait PackageQueryBuilderTrait
{
    public function addPackageFields(array $fields, QueryBuilder $queryBuilder, $alias = 'entity')
    {
        foreach ($fields as $index => $field) {
            if ($index === 0) {
                $queryBuilder->select($alias . '.' . $field->getName());

                continue;
            }

            $queryBuilder->addSelect($alias . '.' . $field->getName());
        }

        return $queryBuilder;
    }
}
