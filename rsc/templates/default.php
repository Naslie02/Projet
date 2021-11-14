<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $this->title ?></title>
    <link rel="stylesheet" type="text/css" href="rsc/stylesheets/main.css">
    <link rel="stylesheet" type="text/css" href="rsc/stylesheets/navbar.css">
    <link rel="stylesheet" type="text/css" href="rsc/stylesheets/connexion_inscription.css">
  </head>
  <body>


    <?php

      include(Router::getTemplatesPath().'/navbar.php');
    ?>

    <?= $this->content ?>
  </body>
</html>
