<?php

namespace Models;

class HomePage extends Model
{
    public function getCategories(): array
    {
        $sql = "SELECT * FROM category WHERE id_category_1 = 0";

        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function getRandomProducts(): array
    {
        $sql = 'SELECT p.name, p.price, m.source img FROM product p INNER JOIN product_media pm ON pm.id_product=p.id INNER JOIN media m ON pm.id_media=m.id ORDER BY RAND() LIMIT 6';

        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        return $statement->fetchAll();
    }
}
