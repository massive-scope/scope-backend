<?php

namespace AppBundle\GraphQL\Mutation\Package;

use AppBundle\Entity\Package;
use AppBundle\Entity\Project;
use AppBundle\GraphQL\Query\Package\PackageQueryBuilderTrait;
use AppBundle\GraphQL\Type\PackageType;
use AppBundle\GraphQL\Type\ProjectType;
use Doctrine\ORM\EntityManagerInterface;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class UpdatePackageField extends AbstractContainerAwareField
{
    use PackageMapperTrait;
    use PackageQueryBuilderTrait;

    public function build(FieldConfig $config)
    {
        $config->addArguments(
            [
                'id' => new NonNullType(new IntType()),
                'title' => new StringType(),
                'description' => new StringType(),
            ]
        );
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $package = $entityManager->find(Package::class, $args['id']);
        $this->mapPackage($args, $package);
        $entityManager->flush();

        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get('doctrine.orm.entity_manager');
        $repository = $entityManager->getRepository(Package::class);
        $queryBuilder = $repository->createQueryBuilder('entity');

        $queryBuilder->where('entity.id = :id')->setParameter('id', $package->getId());
        $this->addPackageFields($info->getFieldASTList(), $queryBuilder);

        return $queryBuilder->getQuery()->getSingleResult();
    }

    public function getType()
    {
        return new PackageType();
    }

    public function getName()
    {
        return 'packageUpdate';
    }

    public function get($id)
    {
        return $this->container->get($id);
    }
}
