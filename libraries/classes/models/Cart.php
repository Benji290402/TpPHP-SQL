<?php

namespace Models;

class Cart extends Model // Sert à récupérer les données de la BDD et les transmettre au controller
{
    protected $table = "oder_detail";

    public function index() {
        /**
         * 1. Récupération des produits
         */
        $product = $this->model->findAll('id ASC');
        // var_dump($product);die;

        /**
         * 2. Affichage
         */
        $pageTitle = "Nos produits"; // Nom de la page
        \Renderer::render("cart/index", compact('cart', 'pageTitle'));
    }
}
