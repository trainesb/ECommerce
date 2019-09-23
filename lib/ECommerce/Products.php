<?php


namespace ECommerce;


class Products extends Table {

    public function __construct(Site $site) {
        parent::__construct($site, "product");
    }

    public function add($post) {
        $sql = <<<SQL
INSERT INTO $this->tableName (sku, title, price, soldout, description, visible)
VALUES (?, ?, ?, ?, ?, ?)
SQL;
        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($post['sku'], $post['title'], $post['price'], $post['sold-out'], $post['description'], $post['visible']));
        if($statement->rowCount() === 0) {
            return false;
        }
        return true;
    }

    public function getAll() {
        $sql = <<<SQL
SELECT * FROM $this->tableName
SQL;
        $statement = $this->pdo()->prepare($sql);
        $statement->execute();
        if($statement->rowCount() === 0) {
            return null;
        }
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}