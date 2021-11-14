<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $this->title ?></title>
    <link rel="stylesheet" type="text/css" href="rsc/stylesheets/main.css">
    <link rel="stylesheet" type="text/css" href="rsc/stylesheets/navbar.css">
    <link rel="stylesheet" type="text/css" href="rsc/stylesheets/connexion_inscription.css">
  </head>
  <main>
    <?php
      include(Router::getTemplatesPath().'/navbar.php');
    ?>
    <div class="feedback"><?= $this->extra_values['feedback'] ?></div>
    <?= $this->content ?>
  </main>
</html>
