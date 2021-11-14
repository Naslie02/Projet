<?php

class AccountStorageMySQL extends AbstractStorageMySQL implements AccountStorage {

  const REF_TABLE = 'comptes';
  // TODO : Faire une requête SQL pour récupérer
  // dynamiquement le(s) clé(s) primaire(s),
  // si on a du temps
  const REF_PRIMARY_KEY_NAME = Account::REF_LOGIN;

  public function __construct(
    string $host,
    string $dbname,
    string $user,
    string $pass,
    int $port = 3306,
    string $charset = "utf8"
  ) {
    parent::__construct(
      $host,
      $dbname,
      $user,
      $pass,
      self::REF_TABLE,
      $port,
      $charset
    );
  }

  public function getColumns() : array {
    return parent::_getColumns();
  }

  public function create(Account $a) {
    $data = array(
      Account::REF_LOGIN => $a->getLogin(),
      Account::REF_HASH => $a->getHash(),
      Account::REF_NOM => $a->getNom(),
      Account::REF_STATUT => 'user',
    );
    parent::_create($data);
  }

  public function read(string $login, array $filter = null) : Account {
    $data = parent::_read($login, self::REF_PRIMARY_KEY_NAME, $filter);
    $builder = new AccountBuilder($data);
    return $builder->build();
  }

  public function readAll(array $filter = null, string $orderBy = null) : array {
    $data = parent::_readAll($filter, $orderBy);
    $tab = array();
    foreach ($data as $account) {
      $builder = new AccountBuilder($account);
      $tab[] = $builder->build();
    }
    return $tab;
  }



  public function update(Account $a) {
    // TODO
  }

  public function delete(Account $a) {
    // TODO
  }











}


