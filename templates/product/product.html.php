<main id="mainProduct">
    <div class="productPage">
        <div id="product">
            <h3><?= $product['name']?></h3>
            <div>
                <img src="<?= $product['img']?>" alt="">
                <div class="caracteristiques">
                    <p>Vendeur : <?= $product['vendor']?></p>
                    <p>Prix : <?= $product['price']?> €</p>
                    <p>Couleur : <?= $product['color']?></p>
                    <p>Taille : <?= $product['size']?></p>
                    <button class="BtnCmd" onclick="window.location.href='index.php?controller=cart&task=command&id=<?=$product['idProduct']?>'">Ajouter dans le panier</button>
                </div>
            </div>
            <p id="description"><?= $product['description']?></p>
        </div>
    </div>
</main>