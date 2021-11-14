<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $this->title ?></title>
    <link rel="stylesheet" type="text/css" href="rsc/stylesheets/main.css">
    <link rel="stylesheet" type="text/css" href="rsc/stylesheets/navbar.css">
  </head>
  <body>
    <?php
      include(Router::getTemplatesPath().'/navbar.php');
    ?>
    <div class="page_header_container">
      <h1><?= $this->content ?></h1>
    </div>
  </body>
</html>
