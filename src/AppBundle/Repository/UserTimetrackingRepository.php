<?php

namespace AppBundle\Repository;

/**
 * UserTimetrackingRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserTimetrackingRepository extends AbstractEntityRepository
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'userTimetracking';
    }
}
