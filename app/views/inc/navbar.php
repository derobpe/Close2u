<nav class="navbar">
    <!-- Navbar Brand -->
    <div class="navbar-brand">
        <a class="navbar-item" href="<?php echo APP_URL; ?>dashboard/">
            <img src="<?php echo APP_URL; ?>app/views/img/logo_v1.png" alt="Logo" width="50" height="50">
        </a>
        <!-- Burger Menu for Mobile -->
        <a role="button" class="navbar-burger" data-target="navbarExampleTransparentExample" aria-label="menu"
            aria-expanded="false">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <!-- Navbar Menu -->
    <div id="navbarExampleTransparentExample" class="navbar-menu">
        <!-- Navbar Start -->
        <div class="navbar-start">
            <a class="navbar-item" href="<?php echo APP_URL; ?>dashboard/">
                Dashboard
            </a>

            <!-- Dropdown for Usuarios -->
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="#">
                    Usuarios
                </a>
                <div class="navbar-dropdown is-boxed">
                    <a class="navbar-item" href="#">
                        Nuevo
                    </a>
                    <a class="navbar-item" href="#">
                        Lista
                    </a>
                    <a class="navbar-item" href="#">
                        Buscar
                    </a>
                </div>
            </div>
        </div>

        <!-- Navbar End -->
        <div class="navbar-end">
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    ** User Name **
                </a>
                <div class="navbar-dropdown is-boxed">
                    <a class="navbar-item" href="#">
                        Mi cuenta
                    </a>
                    <a class="navbar-item" href="#">
                        Mi foto
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item" href="#" id="btn_exit">
                        Salir
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>