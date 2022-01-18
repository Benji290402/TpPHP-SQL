<?php

namespace Controllers;

use Renderer;

class Product extends Controller
{
    protected $modelName = "Product";

    public function index() {

        
        $id_category = filter_input(INPUT_GET, 'id_category', FILTER_VALIDATE_INT);

        $liste = $this->model->findProductByCategory($id_category);
        \Renderer::render('listes/listeproducts', []);
    }
}