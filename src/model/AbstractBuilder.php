<?php

abstract class AbstractBuilder {

  protected $data, $error;

  public function __construct(array $d) {
    $this->data = $d;
    $this->error = null;
  }

  abstract public function isValid() : bool;

  abstract public function build();

  protected function getValue(string $index, string $defaultValue = "") {
    return (isset($this->data[$index]) ? $this->data[$index] : $defaultValue);
  }

  public function getData() : array {
    return $this->data;
  }

  public function getDataRef($str) {
    return $this->data[$str];
  }

  public function getError() : string {
    return $this->error;
  }
}

?>
