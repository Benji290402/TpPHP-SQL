<main>
    <div id="top">
        <div class="categories">
            <?php foreach ($categories as $category): ?>
                <a href="index.php?controller=product&task=showByCat&id=<?= $category['id'] ?>"><?= $category['name'] ?></a>
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
        <div id="topRight">
            <?php if(isset($_SESSION['user'])){ ?>
                <?php if($_SESSION['user']['img']){?>
                    <img class="avatar" src="<?=$_SESSION['user']['img']?>" alt="avatar">
                <?php }else{?>
                    <svg class="avatar" viewBox="0 0 496 512">
                        <g>
                            <path class="guest-secondary" d="M248,8C111,8,0,119,0,256S111,504,248,504,496,393,496,256,385,8,248,8Zm0,96a88,88,0,1,1-88,88A88,88,0,0,1,248,104Zm0,344a191.61,191.61,0,0,1-146.5-68.2C120.3,344.4,157.1,320,200,320a24.76,24.76,0,0,1,7.1,1.1,124.67,124.67,0,0,0,81.8,0A24.76,24.76,0,0,1,296,320c42.9,0,79.7,24.4,98.5,59.8A191.61,191.61,0,0,1,248,448Z"></path>
                            <path class="guest-primary" d="M248,280a88,88,0,1,0-88-88A88,88,0,0,0,248,280Zm48,40a24.76,24.76,0,0,0-7.1,1.1,124.67,124.67,0,0,1-81.8,0A24.76,24.76,0,0,0,200,320c-42.9,0-79.7,24.4-98.5,59.8,68.07,80.91,188.84,91.32,269.75,23.25A192,192,0,0,0,394.5,379.8C375.7,344.4,338.9,320,296,320Z"></path>
                        </g>
                    </svg>
                <?php }?>

                <h2>Bonjour, <?=$_SESSION['user']['pseudo']?></h2>
                <hr>
                <h3>Vos dernières commandes :</h3>
                <?php if(count($lastOrders)>0){?>
                    <div id="lastOrders">
                    <?php foreach ($lastOrders as $product): ?>
                        <div class="product" onclick="window.location.href='index.php?controller=product&task=display&id=<?=$product['idProduit']?>'">
                            <img src="<?= $product['img']?>" alt="">
                            <p><?= $product['name']?></p>
                        </div>
                        <?php endforeach ?>
                    </div>
                <?php }else{?>
                <h3>Plus vide que ça, y'a pas...</h3>
                <?php }?>
            <?php }else{ ?>
            <svg class="avatar" viewBox="0 0 496 512">
                <g>
                    <path class="guest-secondary" d="M248,8C111,8,0,119,0,256S111,504,248,504,496,393,496,256,385,8,248,8Zm0,96a88,88,0,1,1-88,88A88,88,0,0,1,248,104Zm0,344a191.61,191.61,0,0,1-146.5-68.2C120.3,344.4,157.1,320,200,320a24.76,24.76,0,0,1,7.1,1.1,124.67,124.67,0,0,0,81.8,0A24.76,24.76,0,0,1,296,320c42.9,0,79.7,24.4,98.5,59.8A191.61,191.61,0,0,1,248,448Z"></path>
                    <path class="guest-primary" d="M248,280a88,88,0,1,0-88-88A88,88,0,0,0,248,280Zm48,40a24.76,24.76,0,0,0-7.1,1.1,124.67,124.67,0,0,1-81.8,0A24.76,24.76,0,0,0,200,320c-42.9,0-79.7,24.4-98.5,59.8,68.07,80.91,188.84,91.32,269.75,23.25A192,192,0,0,0,394.5,379.8C375.7,344.4,338.9,320,296,320Z"></path>
                </g>
            </svg>
            <div id="connexion">
                <button id="signup" onclick="window.location.href='index.php?controller=users&task=register'">S'inscrire</button>
                <button id="login" onclick="window.location.href='index.php?controller=users&task=login'">Se Connecter</button>
            </div>
            <?php } ?>
        </div>
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

