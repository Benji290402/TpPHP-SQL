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
        // $products = $this->model->getRandomProducts();

        $pageTitle = "Accueil"; // Nom de la page
        \Renderer::render("homePage/index", compact('categories', 'pageTitle','elems'));
    }
}