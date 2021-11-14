<a class="list_item_link" href="<?= $href ?>">
  <div class="list_item">
    <img class="list_item_image" src="<?= $jaquette ?>" alt="Jaquette du titre <?= $musique->getTitre() ?>"/>
    <div class="list_item_legend">
      <p class="list_item_author"><?= $musique->getAuteur() ?></p>
      <p class="list_item_title"><?= $musique->getTitre() ?></p>
      <?php
        if (
          $this->extra_values['orderBy'] !== Musique::REF_TITRE &&
          $this->extra_values['orderBy'] !== Musique::REF_AUTEUR
        )
          echo "<p class=\"list_item_extra\">".$musique->get($this->extra_values['orderBy'])."</p>";
      ?>
    </div>
  </div>
</a>
