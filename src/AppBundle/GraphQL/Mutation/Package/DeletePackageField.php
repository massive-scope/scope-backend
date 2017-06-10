<?php

namespace AppBundle\GraphQL\Mutation\Package;

use AppBundle\Entity\Package;
use AppBundle\GraphQL\Query\Package\PackageQueryBuilderTrait;
use AppBundle\GraphQL\Type\PackageType;
use Doctrine\ORM\EntityManagerInterface;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class DeletePackageField extends AbstractContainerAwareField
{
    public function build(FieldConfig $config)
    {
        $config->addArguments(
            [
                'id' => new NonNullType(new IntType()),
            ]
        );
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get('doctrine.orm.entity_manager');
        $repository = $entityManager->getRepository(Package::class);
        $result = $repository->get($value, $args, $info);

        $entityManager->remove($entityManager->getReference(Package::class, $args['id']));
        $entityManager->flush();

        return $result;
    }

    public function getType()
    {
        return new PackageType();
    }

    public function getName()
    {
        return 'packageDelete';
    }

    public function get($id)
    {
        return $this->container->get($id);
    }
}
