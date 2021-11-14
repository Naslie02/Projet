<?php

abstract class AbstractStorageMySQL {

  private $dbname, $table;
  protected $db;

  public function __construct(
      string $host,
      string $dbname,
      string $user,
      string $pass,
      string $table,
      int $port = 3306,
      string $charset = "utf8"
    ) {
      $this->table = $table;
      $this->dbname = $dbname;
      $dsn = "mysql:host=".$host.";port=".$port.";dbname=".$this->dbname.";charset=".$charset;
      $this->db = new PDO($dsn, $user, $pass);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  protected function _getColumns() : array {
    $query = "select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA = \"".$this->dbname."\" AND TABLE_NAME = :table";
    $data = array(':table' => $this->table);
    $stmt = $this->db->prepare($query);
    $stmt->execute($data);
    $result = $stmt->fetchAll(PDO::FETCH_NUM);
    $tableColumns = array();
    foreach ($result as $value)
      $tableColumns[] = $value[0];
    return $tableColumns;
  }

  protected function _create(array $entry) {
    $query = "insert into ".$table."(".implode(", ", array_keys($entry)).") values (";
    $data = array();
    foreach ($entry as $key => $value)
      $data[":".$key] = $value;
    $query .= implode(", ", array_keys($data)).")";
    $stmt = $this->db->prepare($query);
    $stmt->execute($data);
  }

  protected function _read(string $primaryKey, string $primaryKeyName, array $filter = null) : array {
    $filter = $this->cleanFilter($filter);
    $query = "select ".implode(", ", $filter)." from ".$this->table." where `".$primaryKeyName."`=:pKey";
    $data = array(":pKey" => $primaryKey);
    $stmt = $this->db->prepare($query);
    $stmt->execute($data);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) === 1)
      return $result[0];
    else
      throw new UnexpectedValueException("La requête SQL a renvoyé plus d'un résultat ou aucun résultat");
  }

  protected function _readAll(array $filter = null, string $orderBy = null) : array {
    $filter = $this->cleanFilter($filter);
    if (!is_null($orderBy) and !in_array($orderBy, $this->getColumns(), true))
      $orderBy = null;
    $query = "select ".implode(", ", $filter)." from ".$this->table.(is_null($orderBy) ? "" : " order by `".$orderBy."`");
    return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
  }

  private function cleanFilter($filter) : array {
    $columns = $this->getColumns();
    if (is_null($filter) || empty($filter))
      return $columns;
    $cleanedFilter = array();
    foreach ($filter as $value)
      if (in_array($value, $columns, true))
        $cleanedFilter[] = $value;
    if (empty($cleanedFilter))
      return $columns;
    else
      return $cleanedFilter;
  }
}


?>
