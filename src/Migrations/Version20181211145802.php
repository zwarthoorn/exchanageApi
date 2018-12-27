<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181211145802 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE price_now (id INT AUTO_INCREMENT NOT NULL, buy_average INT NOT NULL, buy_quantity INT NOT NULL, sell_average VARCHAR(255) NOT NULL, sell_quantity INT NOT NULL, overall_average INT NOT NULL, overall_quantity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price_range (id INT AUTO_INCREMENT NOT NULL, item_id INT DEFAULT NULL, buy_price INT NOT NULL, buy_quantity INT NOT NULL, selling_price INT NOT NULL, selling_quantity INT NOT NULL, overal_price INT NOT NULL, overal_quantity INT NOT NULL, ts DATETIME NOT NULL, INDEX IDX_B84E5229126F525E (item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE help (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT NOT NULL, price_new_id INT NOT NULL, name VARCHAR(255) NOT NULL, store INT NOT NULL, member TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_1F1B251EF09F1BE3 (price_new_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE price_range ADD CONSTRAINT FK_B84E5229126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251EF09F1BE3 FOREIGN KEY (price_new_id) REFERENCES price_now (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251EF09F1BE3');
        $this->addSql('ALTER TABLE price_range DROP FOREIGN KEY FK_B84E5229126F525E');
        $this->addSql('DROP TABLE price_now');
        $this->addSql('DROP TABLE price_range');
        $this->addSql('DROP TABLE help');
        $this->addSql('DROP TABLE item');
    }
}
