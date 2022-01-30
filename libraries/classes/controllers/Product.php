<?php

namespace Controllers;

use Renderer;

class Product extends Controller
{
    protected $modelName = "Product";

    public function index() {

        $produits = $this->model->findAllWithCategory();
      
        \Renderer::render('product/index', compact('produits'));
    }

    public function showByCat() {

        $id_category = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $produits = $this->model->findAllProductByCategory($id_category);
        $pageTitle = $this->model->getCategory($id_category);
        $categories = $this->model->getCategories();
       
        \Renderer::render('product/index', compact('produits','pageTitle','categories'));
    }
    public function search() {
        $search = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $produits = $this->model->searchProduct($search);
        $pageTitle = "Recherche => ".$search;
        $categories = $this->model->getCategories();

        \Renderer::render('product/index', compact('produits','pageTitle','search','categories'));
    }
}