

<?php if (count($liste) === 0) : ?>
    <p>Il n'y a pas de produits concernant cette catégorie !</p>
<?php else : ?>
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>description</th>
            <th>prix</th>
            <th>Id catégory</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($liste as $produit) : ?>
        <!-- <p>Il y a  <?= $produit['id_product'] ?> de produit dans la catégorie <?= $category['name'] ?> </p> -->
        <tr>
            <td><?= $produit['id'] ?></th>
            <td><?= $produit['name'] ?></th>
            <td><?= $produit['description'] ?></th>
            <td><?= $produit['price'] ?> €</th>
            <td><?= $produit['id_category'] ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php endif ?>


