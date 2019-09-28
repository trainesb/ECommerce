<?php


namespace ECommerce\Tables;


use ECommerce\Site;

class ProductSubMaps extends Table {

    public function __construct(Site $site) {
        parent::__construct($site, "product_sub_map");
    }

    public function add($sku, $subId) {
        $sql = <<<SQL
INSERT INTO $this->tableName (sku, sub_id)
VALUES (?, ?)
SQL;
        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($sku, $subId));
        if($statement->rowCount() === 0) {
            return false;
        }
        return true;
    }
}