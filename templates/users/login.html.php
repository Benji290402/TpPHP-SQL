<div>
    <h2 class="login-title">Se connecter</h2></br>

    <form action="index.php?controller=users&task=login" method="post">
        <div class="login-form">
            <input id="login-email" name="email" type="text" placeholder="email">
            <input id="login-password" name="password" type="password" placeholder="password">

            <input id="login-button" type="submit" value="Se connecter">
        </div>
    </form>
    <a class="login-redirection" href="index.php?controller=users&task=register">Créer un compte</a>
</div>