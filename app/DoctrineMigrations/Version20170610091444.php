<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170610091444 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        \Prooph\EventStore\Adapter\Doctrine\Schema\EventStoreSchema::createSingleStream($schema, 'event_stream', true);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        \Prooph\EventStore\Adapter\Doctrine\Schema\EventStoreSchema::dropStream($schema, 'event_stream');
    }
}
