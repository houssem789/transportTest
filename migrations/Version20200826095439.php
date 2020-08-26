<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200826095439 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE correspondance (id INT AUTO_INCREMENT NOT NULL, mode_transport_id INT DEFAULT NULL, station_id INT DEFAULT NULL, INDEX IDX_A562D1E71305CBCC (mode_transport_id), INDEX IDX_A562D1E721BDB235 (station_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fullfidesio (id INT AUTO_INCREMENT NOT NULL, geo_point VARCHAR(255) NOT NULL, geo_shape LONGTEXT NOT NULL, objectid VARCHAR(255) NOT NULL, idrefzdl VARCHAR(255) NOT NULL, garesid VARCHAR(255) NOT NULL, nom_gare VARCHAR(255) NOT NULL, nomlong VARCHAR(255) NOT NULL, nom_iv VARCHAR(255) NOT NULL, num_mod VARCHAR(255) NOT NULL, mode_ VARCHAR(255) NOT NULL, fer VARCHAR(255) NOT NULL, train VARCHAR(255) NOT NULL, rer VARCHAR(255) NOT NULL, metro VARCHAR(255) NOT NULL, tramway VARCHAR(255) NOT NULL, navette VARCHAR(255) NOT NULL, val VARCHAR(255) NOT NULL, terfer VARCHAR(255) NOT NULL, tertrain VARCHAR(255) NOT NULL, terrer VARCHAR(255) NOT NULL, termetro VARCHAR(255) NOT NULL, tertram VARCHAR(255) NOT NULL, ternavette VARCHAR(255) NOT NULL, terval VARCHAR(255) NOT NULL, iderefliga VARCHAR(255) NOT NULL, idrefligc VARCHAR(255) DEFAULT NULL, ligne VARCHAR(255) DEFAULT NULL, cod_ligf DOUBLE PRECISION NOT NULL, ligne_code VARCHAR(255) NOT NULL, indice_lig VARCHAR(255) NOT NULL, reseau VARCHAR(255) NOT NULL, res_com VARCHAR(255) NOT NULL, code_resf DOUBLE PRECISION NOT NULL, res_stif DOUBLE PRECISION NOT NULL, exploitant VARCHAR(255) NOT NULL, num_psr VARCHAR(255) NOT NULL, idf VARCHAR(255) NOT NULL, principal VARCHAR(255) NOT NULL, xelement VARCHAR(255) NOT NULL, yelement VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mode_transport (id INT AUTO_INCREMENT NOT NULL, type_transport VARCHAR(255) NOT NULL, ligne VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE station (id INT AUTO_INCREMENT NOT NULL, nom_gare VARCHAR(255) NOT NULL, nomlong VARCHAR(255) NOT NULL, nom_iv VARCHAR(255) NOT NULL, garesid VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE station_mode_transport (station_id INT NOT NULL, mode_transport_id INT NOT NULL, INDEX IDX_223563A021BDB235 (station_id), INDEX IDX_223563A01305CBCC (mode_transport_id), PRIMARY KEY(station_id, mode_transport_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE terminus (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE terminus_station (terminus_id INT NOT NULL, station_id INT NOT NULL, INDEX IDX_34CF1EA57A611A63 (terminus_id), INDEX IDX_34CF1EA521BDB235 (station_id), PRIMARY KEY(terminus_id, station_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE terminus_mode_transport (terminus_id INT NOT NULL, mode_transport_id INT NOT NULL, INDEX IDX_FE7772D7A611A63 (terminus_id), INDEX IDX_FE7772D1305CBCC (mode_transport_id), PRIMARY KEY(terminus_id, mode_transport_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE correspondance ADD CONSTRAINT FK_A562D1E71305CBCC FOREIGN KEY (mode_transport_id) REFERENCES mode_transport (id)');
        $this->addSql('ALTER TABLE correspondance ADD CONSTRAINT FK_A562D1E721BDB235 FOREIGN KEY (station_id) REFERENCES station (id)');
        $this->addSql('ALTER TABLE station_mode_transport ADD CONSTRAINT FK_223563A021BDB235 FOREIGN KEY (station_id) REFERENCES station (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE station_mode_transport ADD CONSTRAINT FK_223563A01305CBCC FOREIGN KEY (mode_transport_id) REFERENCES mode_transport (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE terminus_station ADD CONSTRAINT FK_34CF1EA57A611A63 FOREIGN KEY (terminus_id) REFERENCES terminus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE terminus_station ADD CONSTRAINT FK_34CF1EA521BDB235 FOREIGN KEY (station_id) REFERENCES station (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE terminus_mode_transport ADD CONSTRAINT FK_FE7772D7A611A63 FOREIGN KEY (terminus_id) REFERENCES terminus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE terminus_mode_transport ADD CONSTRAINT FK_FE7772D1305CBCC FOREIGN KEY (mode_transport_id) REFERENCES mode_transport (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE correspondance DROP FOREIGN KEY FK_A562D1E71305CBCC');
        $this->addSql('ALTER TABLE station_mode_transport DROP FOREIGN KEY FK_223563A01305CBCC');
        $this->addSql('ALTER TABLE terminus_mode_transport DROP FOREIGN KEY FK_FE7772D1305CBCC');
        $this->addSql('ALTER TABLE correspondance DROP FOREIGN KEY FK_A562D1E721BDB235');
        $this->addSql('ALTER TABLE station_mode_transport DROP FOREIGN KEY FK_223563A021BDB235');
        $this->addSql('ALTER TABLE terminus_station DROP FOREIGN KEY FK_34CF1EA521BDB235');
        $this->addSql('ALTER TABLE terminus_station DROP FOREIGN KEY FK_34CF1EA57A611A63');
        $this->addSql('ALTER TABLE terminus_mode_transport DROP FOREIGN KEY FK_FE7772D7A611A63');
        $this->addSql('DROP TABLE correspondance');
        $this->addSql('DROP TABLE fullfidesio');
        $this->addSql('DROP TABLE mode_transport');
        $this->addSql('DROP TABLE station');
        $this->addSql('DROP TABLE station_mode_transport');
        $this->addSql('DROP TABLE terminus');
        $this->addSql('DROP TABLE terminus_station');
        $this->addSql('DROP TABLE terminus_mode_transport');
    }
}
