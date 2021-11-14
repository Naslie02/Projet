<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $this->title ?></title>
    <link rel="stylesheet" type="text/css" href="src/menu.css">
    <link rel="stylesheet" type="text/css" href="src/connexion.css">
    <link rel="stylesheet" type="text/css" href="src/acceuil.css">
  </head>
  <body>

    <?php
      include 'src/model/navbar.php';
      //include 'src/model/footer.php';
     ?>

    <?= $this->content ?>





  </body>
</html>
