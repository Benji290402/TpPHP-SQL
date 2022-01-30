<?php

namespace Controllers;


class Cart extends Controller
{
    protected $modelName = "Cart";

    public function index() {
        $pageTitle = "Panier";
        $productModel = new \Models\product;

        // Si utilisateur connecté, récupérer son panier
        if(isset($_SESSION['user'])){
            $order = $productModel->getOrder($_SESSION['user']['id']);

            \Renderer::render("cart/index", compact('pageTitle','order'));
        } else {
            \Renderer::render("cart/index", compact('pageTitle'));
        }
    }
}