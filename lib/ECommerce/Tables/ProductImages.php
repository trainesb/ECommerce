<?php


namespace ECommerce\Tables;


use ECommerce\Site;

class ProductImages extends Table {

    public function __construct(Site $site) {
        parent::__construct($site, "product_img");
    }

    public function add($sku, $img) {
        $sql = <<<SQL
INSERT INTO $this->tableName (sku, img)
VALUES (?, ?)
SQL;
        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($sku, $img));
        if($statement->rowCount() === 0) {
            return false;
        }
        return true;
    }

    public function getBySku($sku) {
        $sql = "SELECT img FROM ".$this->getTableName()." WHERE sku=?";
        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($sku));
        if($statement->rowCount() === 0) {
            return false;
        }
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
