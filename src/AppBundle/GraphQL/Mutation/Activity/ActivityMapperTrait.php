<?php

namespace AppBundle\GraphQL\Mutation\Activity;

use AppBundle\Entity\Activity;

trait ActivityMapperTrait
{
    public function mapActivity(array $data, Activity $activity)
    {
        $activity->setLastUpdate(new \DateTime());

        if (array_key_exists('title', $data)) {
            $activity->setTitle($data['title']);
        }
        if (array_key_exists('description', $data)) {
            $activity->setDescription($data['description']);
        }

        return $activity;
    }
}
