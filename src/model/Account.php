<?php

class Account {

  private $nom, $login, $hash, $statut;

  const REF_LOGIN = 'login';
  const REF_HASH = 'hash';
  const REF_NOM = 'nom';
  const REF_STATUT = 'statut';

  public function __construct(
    string $login,
    string $hash,
    string $nom,
    string $statut='user'
  ) {
    $this->login = $login;
    $this->hash = $hash;
    $this->nom = $nom;
    $this->statut = $statut;
  }

  public function get(string $ref) : string {
    return $this->$ref;
  }

  public function getNom() : string {
    return $this->nom;
  }

  public function getLogin() : string {
    return $this->login;
  }

  public function getHash() : string {
    return $this->hash;
  }

  public function getStatut() : string {
    return $this->statut;
  }
}
?>
