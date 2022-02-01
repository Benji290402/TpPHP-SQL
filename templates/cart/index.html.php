<main>
    <div class="cart">
        <h2>Mon panier</h2>
        <div class="list">
            <?php if (isset($order)) { 
                foreach ($order as $product): ?>
                <div class="cartProduct">
                    <img onclick="goToProduct(<?= $product['idProduit']?>)" src="<?= $product['img']?>" alt="">
                    <p onclick="goToProduct(<?= $product['idProduit']?>)" class="description"><?= $product['name']?></p>
                    <p class="prixU"><?= $product['price']?> €</p>
                    <p class="quantity"><?= $product['quantity']?></p>
                    <p class="prixT"><?= $product['quantity']*$product['price']?> €</p>
                    <svg viewBox="0 0 448 512" onclick="window.location.href='index.php?controller=cart&task=delete&id=<?=$product['idProduit']?>'" class="trash">
                        <g class="fa-group">
                            <path class="negative-color-secondary" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V96H32zm272-288a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0z"></path>
                            <path class="negative-color-primary" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM128 160a16 16 0 0 0-16 16v224a16 16 0 0 0 32 0V176a16 16 0 0 0-16-16zm96 0a16 16 0 0 0-16 16v224a16 16 0 0 0 32 0V176a16 16 0 0 0-16-16zm96 0a16 16 0 0 0-16 16v224a16 16 0 0 0 32 0V176a16 16 0 0 0-16-16z"></path>
                        </g>
                    </svg>
                </div>
                <?php endforeach;
            }?>
        </div>
        <div class="totalCart">
            <h2>Total : <?=$total?> €</h2>
            <button onclick="window.location.href='index.php?controller=cart&task=payement'">Payer</button>
        </div>
    </div>
</main>
