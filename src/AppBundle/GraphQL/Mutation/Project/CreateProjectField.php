<?php

namespace AppBundle\GraphQL\Mutation\Project;

use AppBundle\CQRS\Model\Project\Command\CreateProject;
use AppBundle\Entity\Process;
use AppBundle\Entity\Project;
use AppBundle\GraphQL\Type\ProjectType;
use Doctrine\ORM\EntityManagerInterface;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\FloatType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class CreateProjectField extends AbstractContainerAwareField
{
    use ProjectMapperTrait;
    use ProcessMapperTrait;

    public function build(FieldConfig $config)
    {
        $config->addArguments(
            [
                'title' => new NonNullType(new StringType()),
                'budget' => new FloatType(),
                'hours' => new FloatType(),
                'startDate' => new DateTimeType(),
                'endDate' => new DateTimeType(),
            ]
        );
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $command = CreateProject::withData($args['title']);
        $this->get('prooph_service_bus.todo_command_bus')->dispatch($command);

        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get('doctrine.orm.entity_manager');
        $repository = $entityManager->getRepository(Project::class);

        return $repository->get($value, ['id' => $command->getProjectId()->toString()], $info);
    }

    public function getType()
    {
        return new ProjectType();
    }

    public function getName()
    {
        return 'projectCreate';
    }

    public function get($id)
    {
        return $this->container->get($id);
    }
}
