<main id="register">
    <h2>Créer un compte</h2></br>

    <form action="index.php?controller=users&task=register" method="post">

        <div id="obligatoire">
            <input name="email" type="text" placeholder="email" required>
            <input name="password" type="password" minlength="3" placeholder="password" required>
            <input name="passwordVerify" type="password" minlength="3" placeholder="verify password" required>
            <p>Date de naissance</p>
            <input name="birthDate" type="date" required>
        </div>

        <div id="non-obligatoire">
            <br><input name="pseudo" type="text" placeholder="pseudo">
            <input name="firstName" type="text" placeholder="firstName">
            <input name="name" type="text" placeholder="name">
        </div>

        <br><input type="submit" value="Créer un compte">
    </form>
    <a href="index.php?controller=users&task=login">Se connecter</a>
</main>