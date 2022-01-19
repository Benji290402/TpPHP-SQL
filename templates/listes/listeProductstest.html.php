

<?php if (count($liste) === 0) : ?>
    <p>Il n'y a pas de produits concernant cette catégorie !</p>
<?php else : ?>
<table>
    <thead>
        <tr>
            <th>name</th>
            <th>description</th>
            <th>prix</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($liste as $produit) : ?>
       
        <tr>
            <td><?= $produit['name'] ?></th>
            <td><?= $produit['description'] ?></th>
            <td><?= $produit['price'] ?> €</th>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php endif ?>

