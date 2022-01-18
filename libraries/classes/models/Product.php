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
    public function findProductByCategory(int $id_category): array
    {
        // 2. On récupère les produits
        $query = $this->pdo->prepare("SELECT * FROM product WHERE id_category = :id ORDER BY name ASC");
        $query->execute(['id' => $id_category]);
        $produits = $query->fetchAll();

        // 3. On retourne les produits
        return $produits;
    }
}
