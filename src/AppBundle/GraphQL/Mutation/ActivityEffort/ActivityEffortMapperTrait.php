<?php

namespace AppBundle\GraphQL\Mutation\ActivityEffort;

use AppBundle\Entity\ActivityEffort;

trait ActivityEffortMapperTrait
{
    public function mapActivityEffort(array $data, ActivityEffort $activityEffort)
    {
        if (array_key_exists('description', $data)) {
            $activityEffort->setDescription($data['description']);
        }

        if (array_key_exists('hours', $data)) {
            $activityEffort->setHours($data['hours']);
        }

        if (array_key_exists('date', $data)) {
            $activityEffort->setDate($data['date']);
        }

        return $activityEffort;
    }
}
