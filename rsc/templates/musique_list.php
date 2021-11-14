<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $this->title ?></title>
    <link rel="stylesheet" type="text/css" href="rsc/stylesheets/main.css">
    <link rel="stylesheet" type="text/css" href="rsc/stylesheets/navbar.css">
    <link rel="stylesheet" type="text/css" href="rsc/stylesheets/musique_list.css">
  </head>
  <body>
    <?php
      include(Router::getTemplatesPath().'/navbar.php');
    ?>
    <div class="page_header_container">
      <h1>Liste des musiques</h1>
      <form action="<?= Router::getListPage() ?>" method="post">
        <label for="list_order_select" class="list_order_select_label">Trier par</label>
        <select id="list_order_select" class="list_order_select" name="orderBy">
          <?php
            foreach ($this->extra_values['columns'] as $value)
              echo "<option value=\"".$value."\"".($value === $this->extra_values['orderBy'] ? " selected" : "").">".ucfirst($value)."</option>\n";
          ?>
        </select>
        <input type="submit" value="Trier" />
      </form>
    </div>
    <div class="musique_list">
      <?= $this->content ?>
    </div>
  </body>
</html>
