<main>
    <div id="top">
        <div id="categories">
            <?php foreach ($categories as $category): ?>
                <a href="index.php?controller=product&task=display&id=<?= $category['id'] ?>"><?= $category['name'] ?></a>
            <?php endforeach ?>
        </div>
        <div id="center">
            <div class="newsList">
                <h3>Nouveautés :</h3>
                <?php foreach ($news as $product): ?>
                <div class="news">
                    <img src="<?= $product['img']?>" alt="">
                    <p><?= $product['name']?><br><?= $product['price']?> €</p>
                </div>
                <?php endforeach ?>
            </div>
            <div class="promoList">
                <h3>Prix Réduits :</h3>
                <?php foreach ($promos as $product): ?>
                <div class="promos">
                    <img src="<?= $product['img']?>" alt="">
                    <p><?= $product['name']?><br><?= $product['price']?> €</p>
                </div>
                <?php endforeach ?>
            </div>
        </div>
        <div></div>
    </div>
    
    <?php foreach ($elems as $products): ?>
    <div class="productList">
        <?php foreach ($products as $product): ?>
        <div class="product">
            <img src="<?= $product['img']?>" alt="">
            <p><?= $product['name']?><br><?= $product['price']?> €</p>
        </div>
        <?php endforeach ?>
    </div>
    <?php endforeach ?>
</main>
