<nav>
  <div id="menu-wrapper">
    <div id="menu" class="container">
      <img id="img_menu" src="<?= Router::getImagesPath()."/logo.png" ?>">
      <ul>
        <?php
          foreach ($this->getMenu() as $champ => $lien)
            echo "<li><a href=\"".$lien."\">".$champ."</a></li>";
        ?>
      </ul>
    </div>
  </div>
</nav>
