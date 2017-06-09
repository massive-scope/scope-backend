<?php

namespace AppBundle\GraphQL\Mutation\Package;

use AppBundle\Entity\Package;

trait PackageMapperTrait
{
    public function mapPackage(array $data, Package $package)
    {
        $package->setLastStatusUpdate(new \DateTime());

        if (array_key_exists('title', $data)) {
            $package->setTitle($data['title']);
        }
        if (array_key_exists('description', $data)) {
            $package->setDescription($data['description']);
        }

        return $package;
    }
}
