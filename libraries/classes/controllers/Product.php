<?php

namespace Controllers;

use Renderer;

class Product extends Controller
{
    protected $modelName = "Product";

    public function index() {

        
        $id_category = filter_input(INPUT_GET, 'id_category', FILTER_VALIDATE_INT);
        $liste = $this->model->findAll();
       //$getIdCate = filter_input(INPUT_GET, 'id_category', FILTER_VALIDATE_INT);
       //$id_category=[];
       //if ($getIdCate) {
       //    $id_category = $this->model->findProductByCategory($getIdCate);
       //}
        \Renderer::render('listes/listeProducts', compact('liste'));
    }
}