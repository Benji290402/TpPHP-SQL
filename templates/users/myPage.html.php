<h1>Ma page</h1>

<div>
    <h3>Mes informations</h3>
    <p>Mon email : <?= $_SESSION['user']['email'] ?></p>
    <p>Mon pseudo : <?= $_SESSION['user']['pseudo'] ?></p>
    <p>Mon prénom : <?= $_SESSION['user']['firstName'] ?></p>
    <p>Mon nom : <?= $_SESSION['user']['name'] ?></p>
    <p>Ma date de naissance : <?= $_SESSION['user']['birthday'] ?></p>
</div>

<form action="index.php?controller=users&task=logout" method="post">
    <input type="submit" value="Se déconnecter">
</form>