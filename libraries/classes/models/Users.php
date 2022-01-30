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

// `id`, `pseudo`, `firstName`, `name`, `birthday`, `email`, `password`, `pointFidelity`, `createAt`, `updateAt`

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

    // Connexion
    public function login(string $email = null, string $pass = null)
    {
        $sql = "SELECT * FROM {$this->table} WHERE email LIKE :email AND `password` LIKE :password";

        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            'email' => $email,
            'password' => $pass
        ]);

        return $statement->fetchAll();
    }

    // A vérifier
    public function register(string $pseudo = null, string $firstName = null, string $name = null, $birthDate = null, string $email = null, string $pass = null)
    {
        $sql = "INSERT INTO {$this->table}(`pseudo`, `firstName`, `name`, `birthday`, `email`, `password`) VALUES (:pseudo, :firstName, :name, :birthDate, :email, :pass)";
        
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            'pseudo' => $pseudo,
            'firstName' => $firstName,
            'name' => $name,
            'birthDate' => $birthDate,
            'email' => $email,
            'pass' => $pass
        ]);

        return $statement->fetchAll();
    }
    
    public function getUser(int $id): array
    {
        $sql = 'SELECT pseudo, img FROM users WHERE id= :id';

        $statement = $this->pdo->prepare($sql);
        $statement->execute(['id' => $id]);

        return $statement->fetchAll();
    }

    // Modification des données personnelles

    // A faire
    // public function modifyPseudo(string $email = null, string $pass = null, string $pseudo = null)
    // {
    //     $sql = "SELECT * FROM {$this->table} WHERE email LIKE :email AND `password` LIKE :password";

    //     $statement = $this->pdo->prepare($sql);
    //     $statement->execute(['email' => $email, 'password' => $pass]);

    //     $sql = "UPDATE {$this->table} SET `pseudo` = '$pseudo' WHERE `users`.`id` =  ";
    // }

}
