<?php

namespace Controllers;


class HomePage extends Controller
{
    protected $modelName = "HomePage";

    public function index()
    {
        $userModel = new \Models\users;

        $categories = $this->model->getCategories();
        
        // liste des produits à afficher en bas
        $elems = array($this->model->getRandomProducts(),$this->model->getRandomProducts(),$this->model->getRandomProducts(),$this->model->getRandomProducts(),$this->model->getRandomProducts());
        // liste des derniers produits
        $news = $this->model->getNews();
        //  liste des prix réduits
        $promos = $this->model->getPromos();

        $pageTitle = "Accueil";
        if(isset($_SESSION['user'])){
            $lastOrders = $this->model->getLastOrders($_SESSION['user']['id']);
            $resultat = $userModel->getUser($_SESSION['user']['id']);
            $user = $resultat[0];

            \Renderer::render("homePage/index", compact('categories', 'pageTitle','elems','news','promos','user','lastOrders'));
        }else{
            \Renderer::render("homePage/index", compact('categories', 'pageTitle','elems','news','promos'));
        }
    }
}