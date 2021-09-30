
        <!-- Header -->
        <header id="navbar">

            <div class="primary_header">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/search">Book Appointment</a></li>
                </ul>
            </div>
            <div class="secondary_header" id="secondary_header">
                <a href="/">
                    <img src="/img/Assets/Icons/logo.png" alt="Logo">
                </a>

                <nav>
                    <div class="nav_items">
                        <div class="toggle_collapse">
                            <div class="toggle_icon">
                                <span class="bars_color"><i class="fas fa-bars fa-3x"></i></span>
                            </div>
                            <ul id="collapse_menu">
                                <li><a href="/login" class="<?=$menuItem == 'login' ? 'login-signup-button' :''?>">Login</a></li>
                                <li><a href="/register"  class="<?=$menuItem == 'register' ? 'login-signup-button' :''?>">Register</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

        </header>
