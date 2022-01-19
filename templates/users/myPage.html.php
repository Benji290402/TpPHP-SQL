<h1>Ma page</h1>
<small>Bienvenue <?= $_SESSION['user']['firstName'] ?> <?= $_SESSION['user']['name'] ?></small>

<form action="index.php?controller=users&task=logout" method="post">
    <input type="submit" value="Se déconnecter">
</form>