<?php



class Controller {

  private $view, $auth, $musiques, $auth2, $database;

  public function __construct(View $v, AccountStorage $accs, MusiqueStorage $musiques, InterfaceAccountStorageSQL $cpt) {
    $this->view = $v;
    $this->auth = new AuthentificationManager($accs);
    $this->musiques = $musiques;
    $this->auth2 = new AuthManager($cpt);
    $this->database = new AccountStorageInDatabase();
  }

  public function showHomepage() {
<<<<<<< HEAD
    $this->view->makeHomePage();
    $this->view->render();
  }

  public function showLoginPage() {
    $this->view->makeLoginPage();
   // $this->view->render("connexion_inscription");
    $this->view->render();
  }

  public function showSigninPage() {
    $this->view->makeSigninPage();
    //$this->view->render("connexion_inscription");
    $this->view->render();
  }

  public function showAccountPage() {
    $this->view->makeAccountPage();
    $this->view->render();
=======
    $temp = $this->view->makeHomePage();
    $this->view->render($temp);
>>>>>>> f0d2f388be83c1981be5b7c0d8b8772f838c9c7b
  }

  public function showListPage() {
    // Récupération des colonnes
    $columns = $this->musiques->getColumns();
    // Supression des valeurs inutiles pour la liste de choix du tri
    $restricted_columns = array(
      Musique::REF_ID,
      Musique::REF_JAQUETTE,
      Musique::REF_LIEN,
      Musique::REF_PROPRIETAIRE
    );
    foreach ($columns as $value)
      if (!in_array($value, $restricted_columns, true))
        $corrected_columns[] = $value;
    // Choix par défaut du tri
    if (!isset($_POST['orderBy']) || !in_array($_POST['orderBy'], $corrected_columns, true))
      $_POST['orderBy'] = Musique::REF_TITRE;
    // Choix des colonnes de la requête
    $filter = array(
      Musique::REF_ID,
      Musique::REF_TITRE,
      Musique::REF_AUTEUR,
      Musique::REF_JAQUETTE
    );
    // Ajout du paramètre de tri en colonne pour affichage sur la liste
    // si celui-ci n'est pas déjà ajouté
    if (!in_array($_POST['orderBy'], $filter, true))
      $filter[] = $_POST['orderBy'];
    // Interrogation de la base de données et création de la liste
    $data = $this->musiques->readAll($filter, $_POST['orderBy']);
    $temp = $this->view->makeListPage($data, $_POST['orderBy'], $corrected_columns);
    $this->view->render($temp);
  }

  public function showMusiquePage($id) {
    $temp = $this->view->makeMusiquePage($this->musiques->read($id));
    $this->view->render($temp);
  }

  public function showLoginPage(string $feedback = "") {
    $login = (isset($_POST['login']) ? $_POST['login'] : "");
    $temp = $this->view->makeLoginPage($login, $feedback);
    $this->view->render($temp);
  }

  public function showSigninPage(string $feedback = "") {
    $login = (isset($_POST['login']) ? $_POST['login'] : "");
    $name = (isset($_POST['name']) ? $_POST['name'] : "");
    $temp = $this->view->makeSigninPage($login, $name, $feedback);
    $this->view->render($temp);
  }

  public function showAccountPage() {
    $temp = $this->view->makeAccountPage();
    $this->view->render($temp); // TODO : Template compte.php
  }

  public function showAboutPage(){
    $temp = $this->view->makeAboutPage();
    $this->view->render($temp);
  }

  public function showErrorPage(string $msg = "Erreur inconnue") {
    $temp = $this->view->makeErrorPage($msg);
    $this->view->render($temp);
  }

  public function showDebugPage($var) {
    $temp = $this->view->makeDebugPage($var);
    $this->view->render($temp);
  }

  public function doLogin() {
    if ($this->auth->isConnected())
      $this->showHomepage();
    else {
      try {
        $this->auth->connect($_POST['login'], $_POST['password']);
        $this->showHomepage();
      } catch (\Exception $e) {
        $this->showLoginPage($e->getMessage());
      }
    }
  }

<<<<<<< HEAD
  public function makeConnection($login,$password){
    if($this->auth2->connectUser($login, $password)){
      $_SESSION['user'] = $login;
      Router::redirect(Router::getHomepage());
      //header("Location: ".htmlspecialchars_decode(Router::getHomepage()), true, 303);
    }else{
      Router::redirect(Router::getLoginPage());
      //header("Location: ".htmlspecialchars_decode(Router::getLoginPage()), true, 303);
    }
  }


  public function sauvegarderCompte(array $data)
  {
    $accBuilder = new AccountBuilder($data);

   // echo "je suis avant la vérification du password\n";
    if (password_verify($data['confirmPassword'],password_hash($accBuilder->getDataRef('password'), PASSWORD_BCRYPT))) {
      //echo "Les mots de passe ont été vérifié\n";
      var_dump($accBuilder->isDataInscriptionValid());
      if ($accBuilder->isDataInscriptionValid()) {
        //echo "Le compte builder est valide\n";
        $nouveauProfil = $accBuilder->createProfile();
        //echo "Le compte builder est crée\n";
        $this->database->addAccountInDatabase($nouveauProfil);
        //echo "Le compte builder est stocké\n";
        Router::redirect(Router::getLoginPage());
        //header("Location: ".htmlspecialchars_decode(Router::getLoginPage()), true, 303);
      } else {
        Router::redirect(Router::getSigninPage());
        //header("Location: ".htmlspecialchars_decode(Router::getSigninPage()), true, 303);
      }
    }else {
      Router::redirect(Router::getSigninPage());
      //header("Location: ".htmlspecialchars_decode(Router::getSigninPage()), true, 303);
    }
  }

  /**
   * gestion de la deconnexion
   */
  public function makeLogout(){
    $_SESSION = [];
    Router::redirect(Router::getHomepage());
    //header("Location: ".htmlspecialchars_decode(Router::getHomepage()), true, 303);
  }
=======
  public function doLogout() {
    $this->auth->disconnect();
    $this->showHomepage();
  }

  public function doSignin() {
    // TODO
  }

>>>>>>> f0d2f388be83c1981be5b7c0d8b8772f838c9c7b
}

?>
