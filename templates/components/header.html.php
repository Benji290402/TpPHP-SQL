<header>
    <a href="/">
        <img id="logo" src="assets/img/logo.png" alt="logo">
    </a>
    <form action="" id="searchForm">
        <input type="text" id="searchInput" placeholder="Chercher...">
        <div id="search">
            <svg viewBox="0 0 512 512">
                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
            </svg>
        </div>
    </form>
    <div id="user">
        <svg onclick="redirect('controller=users&task=logout')" class="icon" viewBox="0 0 576 512">
            <g class="fa-group">
                <path class="color-primary" d="M552 64H159.21l52.36 256h293.15a24 24 0 0 0 23.4-18.68l47.27-208a24 24 0 0 0-18.08-28.72A23.69 23.69 0 0 0 552 64z"></path>
                <path class="color-secondary" d="M218.12 352h268.42a24 24 0 0 1 23.4 29.32l-5.52 24.28a56 56 0 1 1-63.6 10.4H231.18a56 56 0 1 1-67.05-8.57L93.88 64H24A24 24 0 0 1 0 40V24A24 24 0 0 1 24 0h102.53A24 24 0 0 1 150 19.19z"></path>
            </g>
        </svg>
        <?php if(isset($_SESSION['user'])){ ?>

        <h2 onclick="redirect('controller=users&task=logout')">Déconnexion</h2>
        <svg onclick="redirect('controller=users&task=logout')" class="icon" viewBox="0 0 512 512">
            <g class="fa-group">
                <path class="color-primary" d="M64 160v192a32 32 0 0 0 32 32h84a12 12 0 0 1 12 12v40a12 12 0 0 1-12 12H96a96 96 0 0 1-96-96V160a96 96 0 0 1 96-96h84a12 12 0 0 1 12 12v40a12 12 0 0 1-12 12H96a32 32 0 0 0-32 32z"></path>
                <path class="color-secondary" d="M288 424v-96H152a23.94 23.94 0 0 1-24-24v-96a23.94 23.94 0 0 1 24-24h136V88c0-21.4 25.9-32 41-17l168 168a24.2 24.2 0 0 1 0 34L329 441c-15 15-41 4.52-41-17z"></path>
            </g>
        </svg>

        <?php }else{ ?>

        <h2 onclick="redirect('controller=users&task=login')">Connexion</h2>
        <svg onclick="redirect('controller=users&task=login')" class="icon" viewBox="0 0 512 512">
            <g class="fa-group">
                <path class="color-primary" d="M512 160v192a96 96 0 0 1-96 96h-84a12 12 0 0 1-12-12v-40a12 12 0 0 1 12-12h84a32 32 0 0 0 32-32V160a32 32 0 0 0-32-32h-84a12 12 0 0 1-12-12V76a12 12 0 0 1 12-12h84a96 96 0 0 1 96 96z"></path>
                <path class="color-secondary" d="M369 273L201 441c-15 15-41 4.5-41-17v-96H24a23.94 23.94 0 0 1-24-24v-96a23.94 23.94 0 0 1 24-24h136V88c0-21.5 26-32 41-17l168 168a24.2 24.2 0 0 1 0 34z" class="fa-primary"></path>
            </g>
        </svg>

        <?php }?>
    </div>
</header>