<?php

interface AccountStorage {

  public function getColumns() : array;

  public function create(Account $a);

  public function read(string $login, array $filer = null) : Account;

  public function readAll(array $filter = null, string $orderBy = null) : array;

  public function update(Account $a);

  public function delete(Account $a);

}

?>
