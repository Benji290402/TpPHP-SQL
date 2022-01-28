<?php

namespace Controllers;


class HomePage extends Controller
{
    protected $modelName = "HomePage";

    // A vérifier
    public function index()
    {
        $categories = $this->model->getCategories();
        
        $elems = array($this->model->getRandomProducts(),$this->model->getRandomProducts(),$this->model->getRandomProducts(),$this->model->getRandomProducts(),$this->model->getRandomProducts());
        $news = $this->model->getNews();
        $promos = $this->model->getPromos();

        $pageTitle = "Accueil"; // Nom de la page
        \Renderer::render("homePage/index", compact('categories', 'pageTitle','elems','news','promos'));
    }
}