<?php

namespace Models;

use DateTime;
use DateTimeZone;

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

    // Connexion
    public function login(string $email = null, string $pass = null)
    {
        $sql = "SELECT * FROM {$this->table} WHERE email LIKE :email AND `password` LIKE :password";

        $statement = $this->pdo->prepare($sql);
        $statement->execute(['email' => $email, 'password' => $pass]);

        return $statement->fetchAll();
    }

    // A vérifier
    public function register(string $pseudo = null, string $firstName = null, string $name = null, $birthDate = null, string $email = null, string $pass = null)
    {
        $createAt = date('Y-m-d H:i:s');
        // var_dump($createAt);
        // Il manque la date d'anniversaire
        $sql = "INSERT INTO `users`(`id`, `pseudo`, `firstName`, `name`, `birthday`, `email`, `password`, `pointFidelity`, `createAt`, `updateAt`) VALUES ('', '$pseudo', '$firstName', '$name', '$birthDate', '$email', '$pass', '0', '$createAt', '2022-01-23 20:30:21.000000')";
        
        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function test(string $email)
    {
        $sql = "INSERT INTO {$this->table}(`id`, `email`) VALUES ('', email LIKE :email)";
        
        $statement = $this->pdo->prepare($sql);
        $statement->execute(['email' => $email]);

        return $statement->fetchAll();
    }

}
