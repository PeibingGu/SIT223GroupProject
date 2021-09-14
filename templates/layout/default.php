<?php


?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title id="page_title">uTute | Home</title>

    <?= $this->Html->meta('icon') ?>

    <link rel="shortcut icon" type="image/x-icon" href="/img/Assets/Icons/globe.png">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Set the title -->
    <title id="page_title">uTute | Home</title>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'bootstrap.min', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
  <header id="navbar">

      <div class="primary_header">
          <ul>
              <li><a href="home.html">Home</a></li>
              <li><a href="#">Book Appointment</a></li>
          </ul>
      </div>
      <div class="secondary_header" id="secondary_header">
          <a href="home.html">
              <img src="/img/Assets/Icons/logo.png" alt="Logo">
          </a>

          <nav>
              <div class="nav_items">
                  <div class="toggle_collapse">
                      <div class="toggle_icon">
                          <span class="bars_color"><i class="fas fa-bars fa-3x"></i></span>
                      </div>
                      <ul id="collapse_menu">
                          <li><a href="#information_section">What is uTute</a></li>
                          <li><a href="#testimonials_section">Testimonials</a></li>
                          <li><a href="#registration_section">Become a Tutor</a></li>
                          <li><a href="../Login/login.html" id="login-signup-button">Login/Sign Up</a></li>
                      </ul>
                  </div>
              </div>
          </nav>
      </div>

  </header>
    <main class="main">
        <div class="container-fluid">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>

    </footer>


    <!-- Link External JavaScript -->
    <script src="/js/home.js" defer></script>
    <?= $this->Html->script(['vendor/jquery-slim.min',
                             'vendor/popper.min',
                             'bootstrap.min',
                             'vendor/holder.min'
                             ]) ?>
</body>
</html>
<script>
const $dropdown = $(".dropdown");
const $dropdownToggle = $(".dropdown-toggle");
const $dropdownMenu = $(".dropdown-menu");
const showClass = "show";

$(window).on("load resize", function() {
if (this.matchMedia("(min-width: 768px)").matches) {
$dropdown.hover(
  function() {
    const $this = $(this);
    $this.addClass(showClass);
    $this.find($dropdownToggle).attr("aria-expanded", "true");
    $this.find($dropdownMenu).addClass(showClass);
  },
  function() {
    const $this = $(this);
    $this.removeClass(showClass);
    $this.find($dropdownToggle).attr("aria-expanded", "false");
    $this.find($dropdownMenu).removeClass(showClass);
  }
);
} else {
$dropdown.off("mouseenter mouseleave");
}
});
</script>
  </body>
</html>
