<h2>Créer un compte</h2></br>

<form action="index.php?controller=users&task=register" method="post">

    <div id="obligatoire">
        <input name="email" type="text" placeholder="email">
        <input name="password" type="password" placeholder="password">
        <input name="passwordVerify" type="password" placeholder="verify password">
    </div>

    <div id="non-obligatoire">
        <input name="pseudo" type="text" placeholder="pseudo">
        <input name="firstName" type="text" placeholder="firstName">
        <input name="name" type="text" placeholder="name">
    </div>

    <input type="submit" value="Créer un compte">
</form>
