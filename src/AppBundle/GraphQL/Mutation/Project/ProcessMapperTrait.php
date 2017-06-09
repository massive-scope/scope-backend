<?php

namespace AppBundle\GraphQL\Mutation\Project;

use AppBundle\Entity\Process;

trait ProcessMapperTrait
{
    public function mapProcess(array $data, Process $process)
    {
        $process->setTitle($data['title']);
        $process->setLastStatusUpdate(new \DateTime());

        if (array_key_exists('startDate', $data)) {
            $process->setStartDate($data['startDate']);
        }
        if (array_key_exists('endDate', $data)) {
            $process->setEndDate($data['endDate']);
        }
        if (array_key_exists('budget', $data)) {
            $process->setBudget($data['budget']);
        }
        if (array_key_exists('hours', $data)) {
            $process->setHours($data['hours']);
        }

        return $process;
    }
}
