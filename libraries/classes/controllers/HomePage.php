<?php

namespace Controllers;


class HomePage extends Controller
{
    protected $modelName = "HomePage";

    public function index()
    {
        $userModel = new \Models\users;
        $productModel = new \Models\product;

        $categories = $productModel->getCategories();
        
        // liste des produits à afficher en bas
        $elems = array($productModel->getRandomProducts(),$productModel->getRandomProducts(),$productModel->getRandomProducts(),$productModel->getRandomProducts(),$productModel->getRandomProducts());
        // liste des derniers produits
        $news = $productModel->getNews();
        //  liste des prix réduits
        $promos = $productModel->getPromos();

        $pageTitle = "Accueil";
        if(isset($_SESSION['user'])){
            $lastOrders = $productModel->getLastOrders($_SESSION['user']['id']);

            \Renderer::render("homePage/index", compact('categories', 'pageTitle','elems','news','promos','lastOrders'));
        }else{
            \Renderer::render("homePage/index", compact('categories', 'pageTitle','elems','news','promos'));
        }
    }
}