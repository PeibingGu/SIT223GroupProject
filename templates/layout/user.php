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
    <title id="page_title"><?=!empty($pageTitle) ? $pageTitle: 'uTute | Home'?></title>

    <link rel="shortcut icon" type="image/x-icon" href="/img/Assets/Icons/globe.png">

        <?= $this->Html->script([
                                 // 'vendor/jquery-slim.min',
                                 'vendor/jquery-3.2.1.min',
                                 ])?>
    <?= $this->Html->css([
                          // 'normalize.min',
                          // 'milligram.min',
                          'bootstrap.min',
                          'bootstrap-datepicker',
                         // 'home',
                          'search',
                          ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

      <?=$this->element('userNavbar', ['menuItem' => $menuItem])?>


    <main class="main no-x-margin no-x-padding">
        <div class="container-fluid no-x-padding no-x-margin">
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
      <?=$this->element("footer")?>
    </footer>


    <?= $this->Html->script([
                             // 'vendor/jquery-slim.min',
                             // 'vendor/popper.min',
                             'bootstrap.min',
                             'bootstrap-datepicker',
                             // 'vendor/holder.min'
                             ]) ?>

    <!-- Link External JavaScript -->
    <script src="/js/search.js" defer></script>
</body>
</html>

  </body>
</html>
