<?php

interface InterfaceAccountStorageSQL
{

    public function checkAuth($login, $hash);
}