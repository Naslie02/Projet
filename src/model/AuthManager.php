<?php

require_once('InterfaceAccountStorageSQL.php');

class AuthManager
{

    private $ac;

    /**
     * @param $ac
     */
    public function __construct(InterfaceAccountStorageSQL $ac)
    {
        $this->ac = $ac;
    }


    public function isUserConnected()
    {
        if (key_exists('user', $_SESSION)) {
            return true;
        }
        return false;
    }



    public function connectUser($login, $hash)
    {
        $account = $this->ac->checkAuth($login, $hash);
        if ($account !== null) {
            $_SESSION['user']= $account;
            return true;
        }
        return false;
    }

}