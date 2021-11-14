<?php

require_once('control/Controller.php');

class Router {

  private $musiques, $auth;

  public function __construct(AccountStorage $accs, MusiqueStorage $musiques) {
    $this->musiques = $musiques;
    $this->auth = new AuthentificationManager($accs);

    $user = $this->auth->getConnectedUser();
   /* if (is_null($user))
      $view = new View($this);
    else if ($user->getStatut() === "admin")
      // TODO : Ajouter une vue administrateur
      $view = new View($this);
    else*/
    $view = new View($this);

    $cpt = new AccountStorageInDatabase();
    $this->controller = new Controller($view, $accs, $this->musiques, $cpt);
  }

  public function main() {
    $c = $this->controller;

    $action = Router::getGETParameter("a");
    switch ($action) {
      case 'login':
        $c->doLogin();
        return;
      case 'logout':
        $c->doLogout();
        return;
      case 'signin':
        $c->doSignin();
        return;
      default:
        break;
    }

    $page = Router::getGETParameter("p");
    switch ($page) {
      case 'login':
        $c->showLoginPage();
        if (key_exists('username-log', $_POST) && key_exists('password-log', $_POST)) {
          $c->makeConnection($_POST['username-log'], $_POST['password-log']);
        }

        break;
      case 'logout':
        $c->makeLogout();
        break;
      case 'signin':
        $c->showSigninPage();
        break;
      case 'account':
        $c->showAccountPage();
        break;
      case 'list':
        $c->showListPage();
        break;
      case 'about':
        $c->showAboutPage();
        break;
      case 'debug':
        $c->showDebugPage($_SESSION);
        break;
      case 'musique':
        $id = Router::getGETParameter("id");
        if ($id === "")
          $c->showErrorPage("Musique inconnue");
        else
          $c->showMusiquePage($id);
        break;
      case 'register_account':
        $c->sauvegarderCompte($_POST);
        break;
      default:
        $c->showHomepage();
        break;
    }

    //var_dump($_POST);
    //var_dump($_SESSION);
  }

  public static function getGETParameter(string $index, string $defaultValue = "") : string {
    return (isset($_GET[$index]) ? $_GET[$index] : $defaultValue);
  }

  public function getAuthentificationManager() : AuthentificationManager {
    return $this->auth;
  }

  // HTTP request pathes

  public static function getHomepage(){
    return "index.php";
  }

  public static function getListPage(){
    return "index.php?p=list";
  }

  public static function getLoginPage(){
    return "index.php?p=login";
  }

  public static function getSigninPage(){
    return "index.php?p=signin";
  }

  public static function getLogoutPage(){
    return "index.php?p=logout";
  }

<<<<<<< HEAD
=======
  public static function getSigninPage(){
    return "index.php?p=signin";
  }
>>>>>>> f0d2f388be83c1981be5b7c0d8b8772f838c9c7b

  public static function getAccountPage(){
    return "index.php?p=account";
  }

  public static function getSaveAccountPage(){
    return "index.php?p=register_account";
  }

  public static function getAboutPage(){
    return "index.php?p=about";
  }

  public static function getDisconnectUser(){
    return "index.php?p=logout";
  }

  public static function getMusiquePage($id) {
    return "index.php?p=musique&id=".$id;
  }

  // POST treatment scripts

  public static function getLoginAction() {
    return "index.php?a=login";
  }

  public static function getLogoutAction() {
    return "index.php?a=logout";
  }

  public static function getSigninAction() {
    return "index.php?a=signin";
  }

  // File structure pathes

  public static function getUploadPath() {
    return "upload";
  }

  public static function getTemplatesPath() {
    return "rsc/templates";
  }

  public static function getImagesPath() {
    return "rsc/images";
  }

  public static function redirect($url){
    if ( !headers_sent() ){  //  Indique si les en-têtes HTTP ont déjà été envoyés
      header('Location:'.$url, true, 303); // Envoie un en-tête HTTP
    }
    else
    {
      echo '<script>';
      echo 'window.location= "'.$url.'";'; // Redirection JavaScript
      echo '</script>';
    }
  }
}


?>
