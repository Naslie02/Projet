<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $this->title ?></title>
    <link rel="stylesheet" type="text/css" href="rsc/stylesheets/main.css">
    <link rel="stylesheet" type="text/css" href="rsc/stylesheets/navbar.css">
    <link rel="stylesheet" type="text/css" href="rsc/stylesheets/musique_page.css">
  </head>
  <body>
    <?php
      include(Router::getTemplatesPath().'/navbar.php');
    ?>
    <div class="musique_page">
      <div class="musique_page_main">
        <img class="musique_page_image" src="<?= Router::getUploadPath()."/jaquettes/".$this->extra_values['musique']->getJaquette() ?>">
        <div class="musique_page_legend">
          <p class="musique_page_author"><?= $this->extra_values['musique']->getAuteur() ?></p>
          <p class="musique_page_title"><?= $this->extra_values['musique']->getTitre() ?></p>
        </div>
      </div>
      <div class="musique_page_more">
        <p class="musique_page_date">Sortie le <?= $this->extra_values['musique']->getDateSortie() ?></p>
        <p class="musique_page_genre">Genre : <?= $this->extra_values['musique']->getGenre() ?></p>
        <p class="musique_page_label">Label : <?= $this->extra_values['musique']->getLabel() ?></p>
        <p class="musique_page_lien"><a href="<?= $this->extra_values['musique']->getLien() ?>" target="_blank" rel="noopener noreferrer">Lien d'écoute</a></p>
        <br />
        <p class="musique_page_proprietaire">Propriétaire : <?= $this->extra_values['musique']->getProprietaire() ?></p>
      </div>
    </div>
  </body>
</html>
