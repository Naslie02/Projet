<nav>
    <div id="menu-wrapper">
        <div id="menu" class="container">
          <img id="img_menu" src="src/model/musica.png">
            <ul>

              <?php
                  foreach ($this->menu as $champ => $lien) {

                      echo "<li> <a href='$lien'> $champ </a> </li>";
                  }
               ?>


            </ul>
        </div>
        <!-- end #menu -->
    </div>
</nav>
