
<main id="mypage">
    <h1>Ma page</h1>

    <div>
        <h3>Mes informations</h3>
        <p>Mon email : <?= $user['email'] ?></p>
        <p>Mon pseudo : <?= $user['pseudo'] ?></p>
        <p>Mon prénom : <?= $user['firstName'] ?></p>
        <p>Mon nom : <?= $user['name'] ?></p>
        <p>Ma date de naissance : <?= $user['birthday'] ?></p>
    </div>

    <div id="commands">
        <h2>Vos commandes</h2>
            <?php if(count($lastOrders)>0){?>
                <div id="lastOrders" style="display: flex; flex-direction:row; flex-wrap: wrap; justify-content:center;">
                <?php foreach ($lastOrders as $product): ?>
                    <div style="width:15%; margin: 20px;" class="product" onclick="window.location.href='index.php?controller=product&task=display&id=<?=$product['idProduit']?>'">
                        <img src="<?= $product['img']?>" alt="">
                        <p><?= $product['name']?></p>
                    </div>
                    <?php endforeach ?>
                </div>
            <?php }else{?>
        <h3>Plus vide que ça, y'a pas...</h3>

        <?php }?>
    </div>

    <form action="index.php?controller=users&task=logout" method="post">
        <input type="submit" value="Se déconnecter">
    </form>
</main>