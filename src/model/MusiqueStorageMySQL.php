<?php

class MusiqueStorageMySQL extends AbstractStorageMySQL implements MusiqueStorage {

  const REF_TABLE = 'musiques';
  // TODO : Faire une requête SQL pour récupérer
  // dynamiquement le(s) clé(s) primaire(s),
  // si on a du temps
  const REF_PRIMARY_KEY_NAME = Musique::REF_ID;

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

  public function create(Musique $m) {
    // TODO
  }

  public function read($id, array $filter = null) : Musique {
    $data = parent::_read($id, self::REF_PRIMARY_KEY_NAME, $filter);
    $builder = new MusiqueBuilder($data);
    return $builder->build();
  }

  public function readAll(array $filter = null, string $orderBy = null) : array {
    $data = parent::_readAll($filter, $orderBy);
    $tab = array();
    foreach ($data as $musique) {
      $builder = new MusiqueBuilder($musique);
      $tab[] = $builder->build();
    }
    return $tab;
  }

  public function update(Musique $m) {
    // TODO
  }

  public function delete(Musique $m) {
    // TODO
  }
}

?>
