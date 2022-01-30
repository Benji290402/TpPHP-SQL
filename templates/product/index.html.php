<main>
    <div class="productPage">
        <div class="categories">
            <?php foreach ($categories as $category): ?>
                <a href="index.php?controller=product&task=showByCat&id=<?= $category['id'] ?>"><?= $category['name'] ?></a>
            <?php endforeach ?>
        </div>
        <div class="productList">
            <?php foreach ($produits as $product): ?>
            <div class="product">
                <img src="<?= $product['img']?>" alt="">
                <p><?= $product['price']?> €<br><?= $product['name']?></p>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</main>