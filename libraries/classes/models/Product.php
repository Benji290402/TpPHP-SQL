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
        $query = $this->pdo->prepare("SELECT * FROM product WHERE id_category like :id ORDER BY name ASC");
        $query->execute(['id' => $id_category]);
        $produits = $query->fetchAll();


        return $produits;
    }
    public function findAllWithCategory()
    {
            
 
        $query = $this->pdo->prepare("SELECT p.name, p.description, p.price, c.name category, c.id id_category, m.source media FROM product p INNER JOIN category c ON c.id=p.id_category INNER JOIN product_media pm ON pm.id_product = p.id INNER JOIN media m ON m.id=pm.id_media;");
        
        $query->execute();
        $produits = $query->fetchAll();
        return $produits;
       
    }
  
    // public function search(){
        
    //        $search = htmlspecialchars($_GET['search']);
    //        $query = $this->pdo->prepare('SELECT name FROM product WHERE name LIKE "%'.$search.'%" ORDER BY DESC');
    //        $titre =$query->fetchAll();
    // }
}
