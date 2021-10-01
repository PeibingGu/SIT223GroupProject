
        <!-- Header -->
        <header id="navbar">

            <div class="primary_header">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/search">Book Appointment</a></li>
                    <li><a href="/" id="logout_button">Logout</a></li>
                </ul>
            </div>
            <div class="secondary_header" id="secondary_header">
                <a href="../Home/home.html">
                    <img src="/img/Assets/Icons/logo.png" alt="Logo">
                </a>

                <nav>
                    <div class="nav_items">
                        <div class="toggle_collapse">
                            <div class="toggle_icon">
                                <span class="bars_color"><i class="fas fa-bars fa-3x"></i></span>
                            </div>
                            <ul id="collapse_menu" class="ml-auto">
                                <li><a href="/search" id="browse_tutor_button">Browse Tutor</a></li>
                                <li id="search_button"><a href="/search"> <img
                                            id="search_icon" src="/img/Assets/Icons/search_icon.png"
                                            alt="Search Icon"></a></li>

                                <li id="balance_button" ><a href="/account"> <img id="balance_icon"
                                            src="/img/Assets/Icons/dolar_sign_icon.png" alt="Dolar Sign Icon"></a>
                                </li>
                                <li id="appointments_button"><a href="/booking"> <img id="appointments_icon"
                                            src="/img/Assets/Icons/schedule_list_icon.png" alt="Schedule List Icon"></a>
                                </li>
                                <li id="chat_button"><a href="/messages/list"> <img id="message_icon"
                                            src="/img/Assets/Icons/message_icon.png" alt="Message Icon"></a>
                                </li>
                                <li id="user_profile_button"><a href="/profile">
                                        <div id="user_initials_container">
                                            <?=(!empty($user['first_name']) ? substr($user['first_name'], 0, 1):' ') .(!empty($user['last_name']) ? substr($user['last_name'], 0, 1):' ')?>
                                        </div>
                                    </a>
                                </li>
                                <li><a href="/upgrade" id="be_a_tutor_button">Be a
                                        Tutor</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

        </header>
