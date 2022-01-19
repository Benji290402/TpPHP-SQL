<?php if (count($produits) === 0) : ?>
    <p>Il n'y a pas de produits concernant cette catégorie !</p>
<?php else : ?>
<table>
    <thead>
        <tr>
            <th>name</th>
            <th>description</th>
            <th>prix</th>
            <!-- <?php if(!$_GET['id']): ?> -->
            <th>Catégory</th>
            <!-- <?php endif?> -->

        </tr>
    </thead>
    <tb>
        <?php foreach ($produits as $produit) : ?>
        <tr>
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


