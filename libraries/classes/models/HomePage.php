<?php

namespace Models;

class HomePage extends Model
{
    public function getCategories(): array // récupération des catégories Principales
    {
        $sql = "SELECT * FROM category WHERE id_category_1 = 0";

        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function getRandomProducts(): array // Récupération aléatoire de produits
    {
        $sql = 'SELECT p.name, p.price, m.source img FROM product p INNER JOIN product_media pm ON pm.id_product=p.id INNER JOIN media m ON pm.id_media=m.id ORDER BY RAND() LIMIT 6';

        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function getNews(): array // Récupération des dernier produits mis en vente
    {
        $sql = 'SELECT p.name, p.price, m.source img FROM product p INNER JOIN product_media pm ON pm.id_product=p.id INNER JOIN media m ON pm.id_media=m.id GROUP BY p.id ORDER BY p.createAt DESC LIMIT 2';

        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function getPromos(): array // Récupération des produits avec les prix les plus bas
    {
        $sql = 'SELECT p.name, p.price, m.source img FROM product p INNER JOIN product_media pm ON pm.id_product=p.id INNER JOIN media m ON pm.id_media=m.id GROUP BY p.id ORDER BY p.price ASC LIMIT 3';

        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function getLastOrders(int $id): array
    {
        $sql = 'SELECT p.name, m.source img, p.id idProduit FROM `order` o INNER JOIN order_detail od ON o.id=od.id_order INNER JOIN product p ON od.id_product=p.id INNER JOIN product_media pm ON p.id=pm.id_product INNER JOIN media m ON pm.id_media=m.id WHERE o.id_user=:id GROUP BY p.id ORDER BY o.createAt DESC LIMIT 2';

        $statement = $this->pdo->prepare($sql);
        $statement->execute(['id' => $id]);

        return $statement->fetchAll();
    }
}
