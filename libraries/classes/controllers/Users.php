<?php

namespace Controllers;

use Http;

// La table users :
// id_user 	pseudo 	firstName 	name 	birthday 	email 	password 	pointFidelity 	role 	createAt 	updateAt

class Users extends Controller
{
    protected $modelName = "Users";

    // Afficher tous les users
    public function index()
    {
        /**
         * 1. Récupération des users
         */
        $users = $this->model->findAll('id ASC');
        // var_dump($users);die;

        /**
         * 2. Affichage
         */
        $pageTitle = "Nos Users"; // Nom de la page
        \Renderer::render("users/login", compact('users', 'pageTitle'));
    }

    public function search()
    {
        $searchValue = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
        $result = [];
        if ($searchValue) {
            $result = $this->model->findByEmail($searchValue);
        }
        $pageTitle = "Email";
        \Renderer::render('users/search', compact('result', 'pageTitle'));
    }

    // A vérifier
    public function register()
    {
        $pseudoValue = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS);
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $emailValue = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $passwordValue = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        $passwordVerify = filter_input(INPUT_POST, 'passwordVerify', FILTER_SANITIZE_SPECIAL_CHARS);

        $birthDateValue = filter_input(INPUT_POST, 'birthDate'); // Voir si filtre nécessaire
    
        $result = [];
        if ($emailValue && $passwordValue && $passwordValue == $passwordVerify) {
            
            $passwordValue = hash("sha512", $passwordValue);
            
            $result = $this->model->register($pseudoValue, $firstName, $name, $birthDateValue, $emailValue, $passwordValue);
            
            $this->model->login($emailValue, $passwordValue);
            
            \Http::redirect("index.php?controller=users&task=login");
        }
    
        $pageTitle = "Créer un compte";
        \Renderer::render('users/register', compact('pageTitle'));
    }

    // Connexion
    public function login()
    {
        $emailValue = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); // name doit être => email dans le html
        $passwordValue = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        $passwordValue = hash("sha512", $passwordValue);

        $result = [];
        if ($emailValue && $passwordValue) {
            $result = $this->model->login($emailValue, $passwordValue);
            // var_dump($result); die;
            if ($result == true) {
                if (count($result) != 0) {
                    $_SESSION['user']['id'] = $result[0]['id'];
                    $_SESSION['user']['pseudo'] = $result[0]['pseudo'];
                    $_SESSION['user']['img'] = $result[0]['img'];
                    \Http::redirect("index.php");
                } else {
                    \Http::redirect("index.php?controller=users&task=login"); // A changer par une vraie page d'erreur
                }
                
            } else {
                // Afficher un message d'erreur
            }
        }
        $pageTitle = "Connexion";
        \Renderer::render('users/login', compact('result', 'pageTitle')); // page à afficher
    }

    public function myPage() // La déconnexion se fait en vidant la $_SESSION via une fonction existante
    {
        $productModel = new \Models\product;
        // Si le user n'est pas connecté, renvoie vers la page de connexion, sinon accède à ma page
        if ($_SESSION['user']) {
            $user = $this->model->getUser($_SESSION['user']['id']);
            $lastOrders = $productModel->getLastOrders($_SESSION['user']['id'],25);

            $pageTitle = "Ma page";
            
            \Renderer::render('users/myPage', compact('user', 'pageTitle','lastOrders'));
        } else {
            \Http::redirect("index.php?controller=users&task=login");
        }
    }

    // Déconnexion
    public function logout()
    {
        unset($_SESSION['user']);
        \Http::redirect("index.php");
    }
}