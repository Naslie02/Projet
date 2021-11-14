<?php

class ViewUtilisateur extends View {

  public function __construct() {
    parent::__construct();

    $this->menu = array(
      'Accueil'     => Router::getHomepage(),
      'Musiques'    => Router::getListPage(),
      'Compte'      => Router::getAccountPage(),
      'Déconnexion' => Router::getLogoutPage(),
      'A propos'    => Router::getAboutPage()
    );
  }

<<<<<<< HEAD
  public function makeHomepage() {
=======
  public function makeHomepage() : string {
    $user = $this->router->getAuthentificationManager()->getConnectedUser();
>>>>>>> f0d2f388be83c1981be5b7c0d8b8772f838c9c7b
    $this->title = "Accueil";
    $this->content = "Bienvenue";
    if (!is_null($user))
      $this->content .= ", ".$user->getNom();
    $this->content .= " !";
    return "accueil";
  }

  public function makeMusiquePage(Musique $musique) : string {
    $this->title = $musique->getTitre()." par ".$musique->getAuteur();
    $this->content = $musique;
    return "musique_page";
  }

  public function makeLoginPage(string $pseudo = "", string $feedback = "") : string {
    return $this->makeAccountPage();
  }

  public function makeSigninPage(string $pseudo = "", string $name = "", string $feedback = "") : string {
    return $this->makeAccountPage();
  }

  public function makeAccountPage() : string {
    $user = $this->router->getAuthentificationManager()->getConnectedUser();
    if (is_null($user))
<<<<<<< HEAD
      $this->makeErrorPage("Vous n'êtes pas connecté.");
=======
      return $this->makeErrorPage("Vous n'êtes pas connecté.");
>>>>>>> f0d2f388be83c1981be5b7c0d8b8772f838c9c7b
    else {
      // TODO
      $this->title = "Compte";
      $this->content = "Compte";
      return "compte";
    }
  }
}


