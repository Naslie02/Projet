<?php

class View {

  protected $title;
  protected $content;
  protected $extra_values;
  protected $menu;
  protected $auth;

  public function __construct() {
    $this->title   = null;
    $this->content = null;
    $this->extra_values = null;
    $asd = new AccountStorageInDatabase();
    $this->auth = new AuthManager($asd);

    $this->menu = array(
      'Accueil'     => Router::getHomepage(),
      'Musiques'    => Router::getListPage(),
      'Inscription' => Router::getSigninPage(),
      'Connexion'   => Router::getLoginPage(),
      'A propos'    => Router::getAboutPage()
    );


    $this->secondMenu = array(
        'Accueil'     => Router::getHomepage(),
        'Musiques'    => Router::getListPage(),
        'A propos'    => Router::getAboutPage(),
        'Se déconnecter' => Router::getDisconnectUser()
    );
  }

  public function render(string $template = "default") {
    if ($this->title === null || $this->content === null) {
      $this->makeErrorPage("Le titre et/ou le contenu sont nuls.");
      $template = "erreur";
    }

    if($this->auth->isUserConnected()){
        $this->menu = $this->secondMenu;
    }
    include(Router::getTemplatesPath()."/".$template.".php");
  }

  public function makeHomepage() : string {
    $this->title = "Accueil";
    $this->content = "Bienvenue !";
    return "accueil";
  }

  public function makeListPage(array $data, string $orderBy, array $orderingColumns) : string {
    $this->title = "Musiques";
    $this->content = "";
    // Préparation du champ de sélection du tri
    $this->extra_values = array('orderBy' => $orderBy, 'columns' => $orderingColumns);
    // Création de la liste item par item
    ob_start();
    foreach ($data as $musique) {
      $jaquette = Router::getUploadPath()."/jaquettes/";
      $directory = scandir($jaquette);
      if (!in_array($musique->getJaquette(), $directory, true))
        $jaquette .= "empty.png";
      else
        $jaquette .= $musique->getJaquette();
      $href = Router::getMusiquePage($musique->getId());
      include(Router::getTemplatesPath()."/musique_list_item.php");
    }
    $this->content .= ob_get_clean();
    // Préparation de la page en cas d'erreur
    if ($this->content === "")
      $this->content = "<p class=\"error\">Pas de musiques disponibles</p>";
    elseif ($this->content === false)
      $this->content = "<p class=\"error\">Erreur lors de la fermeture du tampon de sortie</p>";
    return "musique_list";
  }

  public function makeMusiquePage(Musique $musique) : string {
    return $this->makeErrorPage("Étant non connecté, vous n'avez pas accès au détail d'une musique.");
  }

  public function makeLoginPage(string $pseudo = "", string $feedback = "") : string {
    $this->title = "Connexion";
    $this->extra_values = array('feedback' => $feedback);
    ob_start();
    include(Router::getTemplatesPath()."/connexion.php");
    $this->content = ob_get_clean();
    return "connexion_inscription";
  }

  public function makeSigninPage(string $pseudo = "", string $name = "", string $feedback = "") : string {
    $this->title = "Inscription";
    $this->extra_values = array('feedback' => $feedback);
    ob_start();
    include(Router::getTemplatesPath()."/inscription.php");
    $this->content = ob_get_clean();
    return "connexion_inscription";
  }

  public function makeAccountPage() : string {
    return $this->makeLoginPage();
  }

  public function makeAboutPage() : string {
    // TODO
    $this->title = "A propos";
    $this->content = "Je suis la page à propos";
    return "default";
  }

  public function makeErrorPage(string $msg) : string {
    $this->title = "Erreur";
    $this->content = $msg;
    return "erreur";
  }

  public function makeDebugPage($var) : string {
    $this->title = "Debug";
    $this->content = htmlspecialchars(var_export($var, true));
    return "debug";
  }

  public function getMenu() : array {
    return $this->menu;
  }
}

?>
