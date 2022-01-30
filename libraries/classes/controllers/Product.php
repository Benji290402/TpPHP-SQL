<?php

namespace Controllers;

use Renderer;

class Product extends Controller
{
    protected $modelName = "Product";

    public function show() {

        $produits = $this->model->findAllWithCategory();
      
        \Renderer::render('listes/listeProducts', compact('produits'));
    }

    public function showcat() {

        
        $id_category = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $produits = $this->model->findAllProductByCategory($id_category);
       
        \Renderer::render('listes/listeProducts', compact('produits'));
    }
    public function showsearch() {
        $titre = $this->model->search();

        \Renderer::render('listes/listeProducts', compact('produits'));
    }
}