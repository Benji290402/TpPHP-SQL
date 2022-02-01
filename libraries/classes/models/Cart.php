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
    
    // Récupérer le panier
    public function getOrder(int $id): array // Récupération des produits dans le panier
    {
        // order_detail :  id_product 	id_order 	quantity 	price
        // order : id 	createAt 	updateAt 	numero 	id_user 	id_payement 	id_adresse

        $sql = 'SELECT p.name, m.source img, p.id idProduit, p.price, od.quantity FROM `order` o INNER JOIN order_detail od ON o.id=od.id_order INNER JOIN product p ON od.id_product=p.id INNER JOIN product_media pm ON p.id=pm.id_product INNER JOIN media m ON pm.id_media=m.id WHERE o.id_user=:id AND o.id_payement IS NULL GROUP BY p.id ORDER BY o.createAt DESC';

        $statement = $this->pdo->prepare($sql);
        $statement->execute(['id' => $id]);

        return $statement->fetchAll();
    }

    private function canGetOrderDetail(int $id, int $id_user): bool // Savoir si le produit est déjà dans le panier
    {
        $sql = 'SELECT * FROM order_detail WHERE id_product=:id AND id_order=(SELECT o.id FROM `order` o INNER JOIN users u ON o.id_user=u.id WHERE u.id=:id_user AND o.id_payement IS NULL)';

        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            'id' => $id,
            'id_user' => $id_user
        ]);

        return count($statement->fetchAll())>0 ? true : false;
    }

    public function addProductToOrder(int $id, int $id_user)
    {
        if($this->canGetOrderDetail($id, $id_user)){
            $sql = "UPDATE order_detail SET quantity = quantity+1 WHERE id_order = (SELECT o.id FROM `order` o INNER JOIN users u ON o.id_user=u.id WHERE u.id=:id_user AND o.id_payement IS NULL) AND id_product = :id";

            $statement = $this->pdo->prepare($sql);
            $statement->execute([
                'id' => $id,
                'id_user' => $id_user
            ]);
        }else{
            $sql = "INSERT INTO order_detail(`id_product`, `id_order`) VALUES (:id,(SELECT o.id FROM `order` o INNER JOIN users u ON o.id_user=u.id WHERE u.id=:id_user AND o.id_payement IS NULL))";

            $statement = $this->pdo->prepare($sql);
            $statement->execute([
                'id' => $id,
                'id_user' => $id_user
            ]);
        }
    }

    // A finir
    public function removeProductFromOrder(int $id, int $id_user)
    {
        if($this->canGetOrderDetail($id, $id_user)){
            $sql = "DELETE FROM order_detail WHERE id_product=:id AND id_order=(SELECT o.id FROM `order` o INNER JOIN users u ON o.id_user=u.id WHERE u.id=:id_user AND o.id_payement IS NULL)";
    
            $statement = $this->pdo->prepare($sql);
            $statement->execute([
                'id' => $id,
                'id_user' => $id_user
            ]);
        }
    }

    // Adresse : number - street - postalCode - city
    // Paiement : numCard - expirationDate - CCV
    public function payement(int $id_user, int $number, string $street, int $postalCode, string $city, int $numCard, string $nameCard, string $expirationDate, int $ccv){

            $sql = "INSERT INTO address(`number`, `street`, `postal`, `city`, `country`, `id_user`) VALUES (:number, :street, :postal, :city, 'France', :user)";

            $statement = $this->pdo->prepare($sql);
            $statement->execute([
                'number'=>$number,
                'street'=>$street,
                'postal'=>$postalCode,
                'city'=>$city,
                'user'=>$id_user
            ]);
            
            $sql = "SELECT DISTINCT LAST_INSERT_ID() id FROM address";
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            $adresse = $statement->fetchAll()[0]['id'];
            
            $sql = "INSERT INTO paiement(`token`, `status`) VALUES (:token, 'WAIT')";

            $statement = $this->pdo->prepare($sql);
            $statement->execute([
                'token' => strval($numCard).strval($expirationDate).strval($ccv)
            ]);
            
            $sql = "SELECT DISTINCT LAST_INSERT_ID() id FROM paiement";
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            $paiement = $statement->fetchAll()[0]['id'];

            
            $sql = "UPDATE `order` SET id_payement=:paiement, id_adresse=:adresse WHERE id_user = :user AND id_payement IS NULL";

            $statement = $this->pdo->prepare($sql);
            $statement->execute([
                'paiement'=>$paiement,
                'adresse'=>$adresse,
                'user'=>$id_user
            ]);
            
            $sql = "INSERT INTO `order`(id_user) VALUES (:id)";
            $statement = $this->pdo->prepare($sql);
            $statement->execute(['id'=>$id_user]);
    }
}
