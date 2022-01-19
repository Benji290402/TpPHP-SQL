<?php

namespace Controllers;

use Renderer;

class Product extends Controller
{
    protected $modelName = "Product";

    public function show() {

        
        $produits = $this->model->findAllWithCategory();
       //$getIdCate = filter_input(INPUT_GET, 'id_category', FILTER_VALIDATE_INT);
       //$id_category=[];
       //if ($getIdCate) {
       //    $id_category = $this->model->findProductByCategory($getIdCate);
       //}
        \Renderer::render('listes/listeProducts', compact('produits'));
    }

    public function showcat() {

        
        $id_category = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $produits = $this->model->findAllProductByCategory($id_category);
       //$getIdCate = filter_input(INPUT_GET, 'id_category', FILTER_VALIDATE_INT);
       //$id_category=[];
       //if ($getIdCate) {
       //    $id_category = $this->model->findProductByCategory($getIdCate);
       //}
        \Renderer::render('listes/listeProducts', compact('produits'));
    }
}