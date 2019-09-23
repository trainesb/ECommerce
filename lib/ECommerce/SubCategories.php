<?php


namespace ECommerce;


class SubCategories extends Table {

    public function __construct(Site $site) {
        parent::__construct($site, "sub_cat");
    }

    public function add($post) {
        $sql = <<<SQL
INSERT INTO $this->tableName (name, description, visible, img)
VALUES (?, ?, ?, ?)
SQL;
        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($post['name'], $post['description'], $post['visible']. $post['img']));
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