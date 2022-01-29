<header>
    <a href="/">
        <img id="logo" src="assets/img/logo.png" alt="logo">
    </a>
    <form action="">
        <input type="text">
        <input type="submit" value="Chercher">
    </form>
        <?php if(isset($_SESSION['user'])){ ?>
        <div id="user" onclick="redirect('controller=users&task=logout')">
            <h2>Déconnexion</h2>
            <svg class="log-icon" viewBox="0 0 512 512">
                <g class="fa-group">
                    <path class="log-in" d="M64 160v192a32 32 0 0 0 32 32h84a12 12 0 0 1 12 12v40a12 12 0 0 1-12 12H96a96 96 0 0 1-96-96V160a96 96 0 0 1 96-96h84a12 12 0 0 1 12 12v40a12 12 0 0 1-12 12H96a32 32 0 0 0-32 32z"></path>
                    <path class="log-arrow" d="M288 424v-96H152a23.94 23.94 0 0 1-24-24v-96a23.94 23.94 0 0 1 24-24h136V88c0-21.4 25.9-32 41-17l168 168a24.2 24.2 0 0 1 0 34L329 441c-15 15-41 4.52-41-17z"></path>
                </g>
            </svg>
        </div>
        <?php }else{ ?>
        <div id="user" onclick="redirect('controller=users&task=login')">
            <h2>Connexion</h2>
            <svg class="log-icon" viewBox="0 0 512 512">
                <g class="fa-group">
                    <path class="log-in" d="M512 160v192a96 96 0 0 1-96 96h-84a12 12 0 0 1-12-12v-40a12 12 0 0 1 12-12h84a32 32 0 0 0 32-32V160a32 32 0 0 0-32-32h-84a12 12 0 0 1-12-12V76a12 12 0 0 1 12-12h84a96 96 0 0 1 96 96z"></path>
                    <path class="log-arrow" d="M369 273L201 441c-15 15-41 4.5-41-17v-96H24a23.94 23.94 0 0 1-24-24v-96a23.94 23.94 0 0 1 24-24h136V88c0-21.5 26-32 41-17l168 168a24.2 24.2 0 0 1 0 34z" class="fa-primary"></path>
                </g>
            </svg>
        </div>
        <?php }?>
</header>