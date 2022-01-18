<?php

namespace Models;

/**
 * DANS CE FICHIER ON DEFINIT UNE CLASSE QUI AURA POUR BUT DE GERER LES DONNEES DES USERS
 * 
 * On appelle souvent cela un Model (une 3 composantes de l'artchitecture MVC)
 */

/**
 * Classe qui gère les données des articles
 */
class Users extends Model // Sert à récupérer les données de la BDD et les transmettre au controller
{
    protected $table = "users";

    // Cours
    public function findByEmail(string $email = null)
    {
        $sql = "SELECT * FROM {$this->table} where email like :email";

        $statement = $this->pdo->prepare($sql);
        $statement->execute(['email' => '%' . $email . '%']);

        return $statement->fetchAll();
    }

    // A vérifier
    public function login(string $email = null, string $pass = null)
    {
        $sql = "SELECT * FROM {$this->table} WHERE email LIKE :email AND `password` LIKE :password";

        $statement = $this->pdo->prepare($sql);
        $statement->execute(['email' => $email, 'password' => $pass]);

        return $statement->fetchAll();
    }

}
