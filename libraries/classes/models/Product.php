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
    public function findProductByCategory(int $id_category = null)
    {
        // 2. On récupère les produits
        $query = $this->pdo->prepare("SELECT * FROM product WHERE id_category like :id ORDER BY name ASC");
        $query->execute(['id' => $id_category]);
        $produits = $query->fetchAll();

       //$sql = "SELECT * FROM product WHERE id_category like :id_category ORDER BY name ASC";
       //$statement = $this->pdo->prepare($sql);
       //$statement->execute(['id_category' => $id_category]);
       //return $statement->fetchAll();
        // 3. On retourne les produits
        return $produits;
    }
}
