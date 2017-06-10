<?php

namespace AppBundle\Repository;

use Doctrine\Common\Inflector\Inflector;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Parser\Ast\Field;

/**
 * AbstractEntityRepository.
 */
abstract class AbstractEntityRepository extends EntityRepository
{
    /**
     * Get name.
     *
     * @return string
     */
    abstract protected function getName();

    /**
     * Get fields.
     *
     * return string[]
     */
    abstract protected function getFields();

    /**
     * @param array $value
     * @param $args
     * @param ResolveInfo $info
     *
     * @return mixed
     */
    public function get($value, array $args, ResolveInfo $info)
    {
        $alias = 'entity';
        $id = array_key_exists('id', $args) ? $args['id'] : $value[$this->getName()];

        $queryBuilder = $this->createQueryBuilder($alias);
        $joines = [];
        $this->addFields($info->getFieldASTList(), $queryBuilder, $alias, $joines);

        return $queryBuilder
            ->where('entity.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getSingleResult();
    }

    /**
     * Get List.
     *
     * @paramm string[] $value
     * @param string[] $args
     * @param ResolveInfo $info
     *
     * @return array
     */
    public function getList($value, array $args, ResolveInfo $info)
    {
        $alias = 'entity';
        $queryBuilder = $this->createQueryBuilder($alias);

        $result = [];

        $joines = [];
        $queryBuilder = $this->addSearches($queryBuilder, $args, $alias, $joines);
        $queryBuilder = $this->addFilters($queryBuilder, $value, $args, $alias, $joines);

        if ($field = $info->getFieldAST('total')) {
            $result['total'] = intval(
                $queryBuilder->select('COUNT(' . $alias . '.id)')->getQuery()->getSingleScalarResult()
            );
        }

        if (!$field = $info->getFieldAST('items')) {
            return $result;
        }

        $queryBuilder = $this->addFields($field->getFields(), $queryBuilder, $alias, $joines);

        if (array_key_exists('offset', $args)) {
            $queryBuilder->setFirstResult($args['offset']);
        }

        if (array_key_exists('size', $args)) {
            $queryBuilder->setMaxResults($args['size']);
        }

        $result['items'] = $queryBuilder->getQuery()->getResult();

        return $result;
    }

    /**
     * @param QueryBuilder $queryBuilder
     * @param string[] $value
     * @param string[] $args
     * @param string $alias
     * @param array $joines
     *
     * @return QueryBuilder
     */
    protected function addFilters(QueryBuilder $queryBuilder, $value, array $args, $alias, &$joines)
    {
        $filter = $args;

        if (isset($value['id']) && !isset($filter[$this->getParent()]) && $this->getParent()) {
            $filter[$this->getParent()] = $value['id'];
        }

        foreach ($this->getListFilters() as $searchField) {
            if (array_key_exists($searchField, $filter)) {
                $select = $this->addJoin($queryBuilder, $searchField, $alias, $joines);
                $queryBuilder->where($select . ' = :' . $searchField)
                    ->setParameter($searchField, $filter[$searchField]);
            }
        }

        return $queryBuilder;
    }

    /**
     * @param QueryBuilder $queryBuilder
     * @param string[] $args
     * @param string $alias
     * @param array $joines
     *
     * @return QueryBuilder
     */
    protected function addSearches(QueryBuilder $queryBuilder, array $args, $alias, &$joines)
    {
        foreach ($this->getListSearchFields() as $searchField) {
            if (array_key_exists($searchField, $args)) {
                $select = $this->addJoin($queryBuilder, $searchField, $alias, $joines);
                $queryBuilder->where($select . ' LIKE :' . $searchField)
                    ->setParameter($searchField, '%' . $args[$searchField] . '%');
            }
        }

        return $queryBuilder;
    }

    /**
     * Get join.
     *
     * @param QueryBuilder $queryBuilder
     * @param string $name
     * @param string $alias
     * @param array $joines
     *
     * @return QueryBuilder
     */
    protected function addJoin(QueryBuilder $queryBuilder, $name, $alias, &$joines)
    {
        $select = $this->getFields()[$name];
        $selectParts = explode('.', $select);

        if (count($selectParts) > 1) {
            // Hack to get IDENTITY(process to process
            $joinAliasParts = explode('(', $selectParts[0]);
            $joinAlias = end($joinAliasParts);

            if (!in_array($joinAlias, $joines) && $joinAlias !== 'entity') {
                $queryBuilder->leftJoin($alias . '.' . $joinAlias, $joinAlias);
                $joines[] = $joinAlias;
            }

            if ($joinAlias === 'entity') {
                $select = str_replace('entity.', $alias . '.', $select);
            }
        } else {
            $select = $alias . '.' . $select;
        }

        return $select;
    }

    /**
     * @return string
     */
    protected function getListName()
    {
        return Inflector::pluralize($this->getName());
    }

    /**
     * Get search fields.
     *
     * @return string[]
     */
    protected function getListSearchFields()
    {
        return [];
    }

    /**
     * Get filter fields.
     *
     * @return string[]
     */
    protected function getListFilters()
    {
        return [];
    }

    /**
     * Get parent.
     *
     * @return string
     */
    protected function getParent()
    {
        return;
    }

    /**
     * @param Field[] $fields
     * @param QueryBuilder $queryBuilder
     * @param string $alias
     * @param array $joines
     *
     * @return QueryBuilder
     */
    private function addFields(array $fields, QueryBuilder $queryBuilder, $alias, &$joines)
    {
        $availableFields = $this->getFields();
        $counter = 0;

        $queryBuilder->select($alias . '.id');

        foreach ($fields as $field) {
            if (!array_key_exists($field->getName(), $availableFields)) {
                continue;
            }

            ++$counter;

            $select = $this->addJoin($queryBuilder, $field->getName(), $alias, $joines);
            $queryBuilder->addSelect($select . ' AS ' . $field->getName());
        }

        return $queryBuilder;
    }
}
