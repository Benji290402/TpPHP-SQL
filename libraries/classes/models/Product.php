<?php

namespace Models;

/**
 * DANS CE FICHIER ON DEFINIT UNE CLASSE QUI AURA POUR BUT DE GERER LES DONNEES DES COMMENTAIRES
 * 
 * On appelle souvent cela un Model (une 3 composantes de l'artchitecture MVC)
 */

/**
 * Classe qui gère les données des commentaires
 */
class Product extends Model
{
    protected $table = "product";

    /**
     * Retourne la liste des produits pour un article donné
     *
     * @param integer $article_id
     *
     * @return array
     */
    public function findAllProductByCategory(int $id_category)
    {
        // 2. On récupère les produits
        $query = $this->pdo->prepare("SELECT p.name, p.price, m.source img FROM product p INNER JOIN category c ON c.id=p.id_category INNER JOIN product_media pm ON pm.id_product = p.id INNER JOIN media m ON m.id=pm.id_media WHERE c.id=:id LIMIT 25");
        $query->execute(['id' => $id_category]);
        $produits = $query->fetchAll();


        return $produits;
    }
    public function findAllWithCategory()
    {
        
        $query = $this->pdo->prepare("SELECT p.name, p.price, m.source img FROM product p INNER JOIN category c ON c.id=p.id_category INNER JOIN product_media pm ON pm.id_product = p.id INNER JOIN media m ON m.id=pm.id_media LIMIT 25");
        
        $query->execute();
        $produits = $query->fetchAll();
        return $produits;
       
    }
  
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

    public function getLastOrders(int $id): array // Récupération des deux derniers produits achetés
    {
        $sql = 'SELECT p.name, m.source img, p.id idProduit FROM `order` o INNER JOIN order_detail od ON o.id=od.id_order INNER JOIN product p ON od.id_product=p.id INNER JOIN product_media pm ON p.id=pm.id_product INNER JOIN media m ON pm.id_media=m.id WHERE o.id_user=:id GROUP BY p.id ORDER BY o.createAt DESC LIMIT 2';

        $statement = $this->pdo->prepare($sql);
        $statement->execute(['id' => $id]);

        return $statement->fetchAll();
    }
    // public function search(){
        
    //        $search = htmlspecialchars($_GET['search']);
    //        $query = $this->pdo->prepare('SELECT name FROM product WHERE name LIKE "%'.$search.'%" ORDER BY DESC');
    //        $titre =$query->fetchAll();
    // }
    public function getCategory (int $id) : string {
        $sql = "SELECT * FROM category WHERE id = :id";

        $statement = $this->pdo->prepare($sql);
        $statement->execute(['id'=>$id]);

        return $statement->fetchALL()[0]["name"];
    }

    public function searchProduct(string $name)
    {
        $name = "%".$name."%";
        $sql = "SELECT p.name, p.price, m.source img FROM product p INNER JOIN product_media pm ON pm.id_product = p.id INNER JOIN media m ON m.id=pm.id_media WHERE p.name LIKE :name GROUP BY p.id LIMIT 25";

        $statement = $this->pdo->prepare($sql);
        $statement->execute(['name'=>$name]);

        return $statement->fetchALL();
    }

    // Récupérer le panier
    public function getOrder(int $id): array // Récupération des produits dans le panier
    {
        // order_detail :  id_product 	id_order 	quantity 	price
        // order : id 	createAt 	updateAt 	numero 	id_user 	id_payement 	id_adresse

        $sql = 'SELECT p.name, m.source img, p.id idProduit, p.price, od.quantity FROM `order` o INNER JOIN order_detail od ON o.id=od.id_order INNER JOIN product p ON od.id_product=p.id INNER JOIN product_media pm ON p.id=pm.id_product INNER JOIN media m ON pm.id_media=m.id WHERE o.id_user=:id AND o.id_payement = 0 GROUP BY p.id ORDER BY o.createAt DESC';

        $statement = $this->pdo->prepare($sql);
        $statement->execute(['id' => $id]);

        return $statement->fetchAll();
    }
}