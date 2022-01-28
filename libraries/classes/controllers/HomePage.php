<?php

namespace Controllers;


class HomePage extends Controller
{
    protected $modelName = "HomePage";

    public function index()
    {
        $categories = $this->model->getCategories();
        
        // liste des produits à afficher en bas
        $elems = array($this->model->getRandomProducts(),$this->model->getRandomProducts(),$this->model->getRandomProducts(),$this->model->getRandomProducts(),$this->model->getRandomProducts());
        // liste des derniers produits
        $news = $this->model->getNews();
        //  liste des prix réduits
        $promos = $this->model->getPromos();

        $pageTitle = "Accueil";
        \Renderer::render("homePage/index", compact('categories', 'pageTitle','elems','news','promos'));
    }
}