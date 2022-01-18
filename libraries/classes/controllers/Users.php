<?php

namespace Controllers;

// La table users :
// id_user 	pseudo 	firstName 	name 	birthday 	email 	password 	pointFidelity 	role 	createAt 	updateAt

class Users extends Controller
{
    protected $modelName = "Users";

    // A vérifier
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

}