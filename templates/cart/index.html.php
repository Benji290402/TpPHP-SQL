<main>
    <div class="cart">
        <h2>Mon panier</h2>
        <div class="list">
            <?php foreach ($order as $value): ?>
            <div class="cartProduct">
                <img onclick="goToProduct(<?= $value['idProduit']?>)" src="<?= $value['img']?>" alt="">
                <p onclick="goToProduct(<?= $value['idProduit']?>)" class="description"><?= $value['name']?></p>
                <p class="prixU"><?= $value['price']?> €</p>
                <p class="quantity"><?= $value['quantity']?></p>
                <p class="prixT"><?= $value['quantity']*$value['price']?> €</p>
            </div>
            <?php endforeach ?>
        </div>
        </div>
        <div class="total"></div>
    </div>
</main>
