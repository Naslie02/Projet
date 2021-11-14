<?php

class AuthentificationManager {

  private $accounts;

  const REF_CONNECTED_USER = 'user';

  public function __construct(AccountStorage $accs) {
    $this->accounts = $accs;
  }

  public function getAccounts() : array {
    return $this->accounts->readAll();
  }

  public function connect(string $login, string $password) {
    $user = $this->accounts->read($login);
    if (is_null($user))
      throw new InvalidArgumentException("Le login ou le mot de passe est invalide");
    if (password_verify($password, $user->getHash()))
      $_SESSION[self::REF_CONNECTED_USER] = $user;
    else
      throw new InvalidArgumentException("Le login ou le mot de passe est invalide");
  }

  public function disconnect() {
    unset($_SESSION[self::REF_CONNECTED_USER]);
  }

  public function createAccount(Account $a) {
    $this->accounts->create($a);
  }

  public function isConnected() : bool {
    return isset($_SESSION[self::REF_CONNECTED_USER]);
  }

  public function getConnectedUser() {
    if ($this->isConnected())
      return $_SESSION[self::REF_CONNECTED_USER];
    else
      return null;
  }



  public function connectUser($login, $password)
  {
    $account = $this->lesComptes->checkAuth($login, $password);
    if ($account !== null) {
      $_SESSION['user']= $account;
      return true;
    }
    return false;
  }



  public function disconnectUser()
  {
    unset($_SESSION['user']);
  }



  public function isUserConnected()
  {
    if (key_exists('user', $_SESSION)) {
      return true;
    }
    return false;
  }
}
?>
