<?php

class AccountBuilder extends AbstractBuilder {

  public function __construct(array $d) {
    parent::__construct($d);
  }

  public function isValid() : bool {
    $this->error = array();
    // Met à jour toutes les valeurs inexistantes ou nulles à une chaine vide
    // TODO : Utiliser les références à la place des propriétés
    $reflection = new ReflectionClass(Account::class);
    foreach ($reflection->getProperties() as $propriete) {
      $key = $propriete->getName();
      $this->data[$key] = parent::getValue($key);
      // On met une valeur par défaut au statut
      if ($key === Account::REF_STATUT && $this->data[$key] === "")
        $this->data[$key] = "user";
      // Si il y a un champ autre que le nom qui est vide, il y a erreur
      else if ($key !== Account::REF_NOM && $this->data[$key] === "")
        $this->error[$key] = "Le champ '".$key."' ne peut être vide";
    }
    return empty($this->error);
  }

  public function build() {
    if ($this->isValid())
      return new Account(
        $this->data[Account::REF_LOGIN],
        $this->data[Account::REF_HASH],
        $this->data[Account::REF_NOM],
        $this->data[Account::REF_STATUT],
      );
    else
      throw new InvalidArgumentException(implode(" ; ", $this->error));
  }


  public function createProfile(){

    if (!key_exists("username", $this->data)){
      throw new Exception("Champ manquant pour la création de profil");
    }
    if (!key_exists("password", $this->data)){
      throw new Exception("Champ manquant pour la création de profil");
    }
    if (!key_exists("nom", $this->data)){
      throw new Exception("Champ manquant pour la création de profil");
    }


    return new Account($this->data["username"], $this->data["password"], $this->data["nom"]);
  }


  public function isDataInscriptionValid(){
    $this->error = array();

    if (!key_exists("username", $this->data) || $this->data["username"] === ""){
      $this->error["username"] = "Entrez un pseudo.";
    }else if (mb_strlen($this->data["username"], 'UTF-8') >= 25){
      $this->error["username"] = "Le pseudo doit comporter moins de 25 caractères.";
    }else if ($this->data["username"] === NULL){
      $this->error["username"] = "Ce pseudo existe déjà.";
    }

    if (!key_exists("nom", $this->data) || $this->data["nom"] === ""){
      $this->error["nom"] = "Vous devez entrer un nom.";
    }


    if (!key_exists("password", $this->data) || $this->data["password"] === ""){
      $this->error["password"] = "Vous devez entrer un mot de passe.";
    }

    if (!key_exists("confirmPassword", $this->data) || $this->data["confirmPassword"] === ""){
      $this->error["confirmPassword"] = "Vous devez entrer un mot de passe.";
    }

    return count($this->error) === 0;
  }
}

?>
