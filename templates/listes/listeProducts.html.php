<?php

use Models\Model;

if (count($produits) === 0) : ?>
    <p>Il n'y a pas de produits concernant cette catégorie !</p>
<?php else : ?>
<table>
    <thead>
    <!-- <?php if(isset($_GET['search']) AND !empty($_GET['search'])){ 
        //$search = model->search();
        }?>
       <form method="GET">
            <input type="search" name="search" placeholder="Recherche..." />
            <input type="submit" value="Valider" />
       </form> -->
        <tr>
            <th>Img</th>
            <th>name</th>
            <th>description</th>
            <th>prix</th>
            <!-- <?php if(!$_GET['id']): ?> -->
            <th>Catégory</th>
            <!-- <?php endif?> -->

        </tr>
    </thead>
    <tb>
            <!-- <?php if(!$_GET['id']): ?>
                <h1><?= $produit['category'] ?></h1>
            <?php endif?> -->

        <?php foreach ($produits as $produit) : ?>
        <tr>
            <!-- <?php if(!$_GET['id']): ?> -->
            <td><img src="<?=$produit['media']?>"/></td>
            <!-- <?php else: ?> -->
            <td><img src="<?=$produit['media']?>"/></td>
            <!-- <?php endif?> -->
            <td><?= $produit['name'] ?></th>
            <td><?= $produit['description'] ?></th>
            <td><?= $produit['price'] ?> €</th>
            <!-- <?php if(!$_GET['id']): ?> -->
                <td><a href="index.php?controller=Product&task=showcat&id=<?= $produit['id_category'] ?>"><?= $produit['category'] ?></a></td>
            <!-- <?php endif?> -->

        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php endif ?>

