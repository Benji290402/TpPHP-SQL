<?php

namespace Controllers;


class Cart extends Controller
{
    protected $modelName = "Cart";

    // Affiche le panier
    public function index() {
        $pageTitle = "Mon Panier";
        
        // Si utilisateur connecté, récupérer son panier
        if(isset($_SESSION['user'])){
            $order = $this->model->getOrder($_SESSION['user']['id']);
            $total=0;
            foreach ($order as $prod) {
                $total+=$prod['quantity']*$prod['price'];
            }

            \Renderer::render("cart/index", compact('pageTitle','order','total'));
        } else {
            \Renderer::render("cart/index", compact('pageTitle'));
        }
    }

    // Permet d'ajouter un article au panier
    public function command() {

        // Récupérer id_product via URL
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $this->model->addProductToOrder($id, $_SESSION['user']['id']);

        \Http::redirect("index.php?controller=product&task=display&id=$id");
    }

    // Permet d'ajouter un article au panier
    public function delete() {

        // Récupérer id_product via URL
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $this->model->removeProductFromOrder($id, $_SESSION['user']['id']);

        \Http::redirect("index.php?controller=cart&task=index");
    }

    public function payement() {
        $pageTitle = "Payer ma commande";
        // Récupérer les données envoyées
        
        // Adresse : number - street - postalCode - city
        $number = filter_input(INPUT_GET, 'number', FILTER_SANITIZE_SPECIAL_CHARS);
        $street = filter_input(INPUT_GET, 'street', FILTER_SANITIZE_SPECIAL_CHARS);
        $postalCode = filter_input(INPUT_GET, 'postalCode', FILTER_SANITIZE_SPECIAL_CHARS);
        $city = filter_input(INPUT_GET, 'city', FILTER_SANITIZE_SPECIAL_CHARS);

        // Paiement : numCard - expirationDate - CCV
        $numCard = filter_input(INPUT_GET, 'numCard', FILTER_SANITIZE_SPECIAL_CHARS);
        $nameCard = filter_input(INPUT_GET, 'nameCard', FILTER_SANITIZE_SPECIAL_CHARS);
        $expirationDate = filter_input(INPUT_GET, 'expirationDate', FILTER_SANITIZE_SPECIAL_CHARS);
        $CCV = filter_input(INPUT_GET, 'ccv', FILTER_SANITIZE_SPECIAL_CHARS);
    
        
        if ($number && $street && $postalCode && $city && $numCard && $nameCard && $expirationDate && $CCV) {
            
            $test = $this->model->payement($_SESSION['user']['id'], $number, $street, $postalCode, $city, $numCard, $nameCard, $expirationDate, $CCV);
            var_dump($test);
            
            \Http::redirect("index.php?controller=homepage&task=index");
        }else{
            \Renderer::render("cart/payement", compact('pageTitle'));
        }
    }
}
