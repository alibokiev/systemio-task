<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240427125351 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE coupons_coupon (id SERIAL NOT NULL, code VARCHAR(255) NOT NULL, discount VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE products_product (id VARCHAR(26) NOT NULL, name VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE taxes_tax (id SERIAL NOT NULL, tax_percent VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, country_abbreviations VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE users_user (id VARCHAR(26) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_421A9847E7927C74 ON users_user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE coupons_coupon');
        $this->addSql('DROP TABLE products_product');
        $this->addSql('DROP TABLE taxes_tax');
        $this->addSql('DROP TABLE users_user');
    }
}
