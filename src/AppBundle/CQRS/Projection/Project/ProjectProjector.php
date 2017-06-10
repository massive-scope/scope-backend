<?php

namespace AppBundle\CQRS\Projection\Project;

use AppBundle\CQRS\Model\Project\Event\ProjectWasCreated;
use AppBundle\Entity\Project;
use AppBundle\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;

class ProjectProjector
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var ProjectRepository
     */
    private $repository;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository(Project::class);
    }

    public function onProjectWasCreated(ProjectWasCreated $event)
    {
        $project = new Project($event->getProjectId()->toString());
        $project->setTitle($event->getTitle());

        $this->entityManager->persist($project);
        $this->entityManager->flush();
    }
}
