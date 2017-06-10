<?php

namespace AppBundle\GraphQL\Mutation\Package;

use AppBundle\Entity\Package;
use AppBundle\Entity\Project;
use AppBundle\GraphQL\Query\Package\PackageQueryBuilderTrait;
use AppBundle\GraphQL\Type\PackageType;
use Doctrine\ORM\EntityManagerInterface;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class CreatePackageField extends AbstractContainerAwareField
{
    use PackageMapperTrait;

    public function build(FieldConfig $config)
    {
        $config->addArguments(
            [
                'project' => new NonNullType(new IntType()),
                'title' => new NonNullType(new StringType()),
                'description' => new StringType(),
            ]
        );
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $project = $entityManager->find(Project::class, $args['project']);
        $process = $project->getProcesses()->first();

        $package = new Package($process);
        $entityManager->persist($this->mapPackage($args, $package));
        $entityManager->flush();

        $repository = $entityManager->getRepository(Package::class);

        return $repository->get($value, ['id' => $package->getId()], $info);
    }

    public function getType()
    {
        return new PackageType();
    }

    public function getName()
    {
        return 'packageCreate';
    }

    public function get($id)
    {
        return $this->container->get($id);
    }
}
