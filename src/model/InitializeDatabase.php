<?php

class InitializeDatabase
{

    private PDO $bdd;

    /**
     * @param $bdd
     */
    public function __construct()
    {
        $servername =  'mysql.info.unicaen.fr';
        $dbname   =  '21910271_1';
        $username =  '21910271';
        $password =  'ma1eepheT5seiKia';


        try {
            $this->bdd = new PDO("mysql:host=".$servername.";dbname=".$dbname.";charset=utf8mb4", $username, $password);
        } catch (Exception $e) {
            die('Erreur '.$e->getMessage());
        }

        $this->bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @return PDO
     */
    public function getBdd(): PDO
    {
        return $this->bdd;
    }



}