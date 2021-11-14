<?php

interface MusiqueStorage {

  public function getColumns() : array;

  public function create(Musique $m);

  public function read($id, array $filer = null) : Musique;

  public function readAll(array $filter = null, string $orderBy = null) : array;

  public function update(Musique $m);

  public function delete(Musique $m);
}

?>
