<?php

namespace AppBundle\GraphQL\Query\User;

use AppBundle\Entity\User;
use AppBundle\GraphQL\Type\UsersType;
use Doctrine\ORM\EntityManagerInterface;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class UsersField extends AbstractContainerAwareField
{
    public function build(FieldConfig $config)
    {
        $this->addArgument('login', new StringType());
        $this->addArgument('offset', new IntType());
        $this->addArgument('size', new IntType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get('doctrine.orm.entity_manager');
        $repository = $entityManager->getRepository(User::class);

        return $repository->getList(
            $value,
            $args,
            $info
        );
    }

    public function getType()
    {
        return new UsersType();
    }

    public function get($id)
    {
        return $this->container->get($id);
    }
}
