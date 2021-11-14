<?php

require_once('InitializeDatabase.php');
require_once('InterfaceAccountStorageSQL.php');
require_once('Account.php');

class AccountStorageInDatabase implements InterfaceAccountStorageSQL
{

    private $database;

    /**
     * @param $database
     */
    public function __construct()
    {
        $this->database = new InitializeDatabase();
    }


    public function checkAuth($login, $hash)
    {
        $requete='SELECT * FROM comptes';
        $statement=$this->database->getBdd()->prepare($requete);
        $statement->execute();
        $theRequestResult = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($theRequestResult as $result) {
            if($login == $result['login'] && password_verify($hash,$result['hash'])){
                return  new Account($result['login'],$result['hash'],$result['nom']);
            }
        }
        return null;
    }



    public function addAccountInDatabase(Account $ac){
        $requete = $this->database->getBdd()->prepare("INSERT INTO comptes (login, hash, nom, statut) VALUES (:login, :hash, :nom,:statut);");
        $data = array(
            ':login' => $ac->getLogin(),
            ':hash' => password_hash($ac->getHash(), PASSWORD_BCRYPT),
            ':nom' => $ac->getNom(),
            ':statut' => $ac->getStatut()
        );
        $requete->execute($data);

        return $this->database->getBdd()->lastInsertId();
    }


    public function getUserByLogin($login)
    {
        $requete  = $this->database->getBdd()->prepare("SELECT * FROM comptes WHERE login='".$login."';");
        $requete->execute();
        $user = $requete->fetchAll(PDO::FETCH_ASSOC)[0];

        return $user;
    }


    public function getUserHash($login)
    {
        $requete  = $this->database->getBdd()->prepare("SELECT hash FROM comptes WHERE login = '".$login."';");
        $requete->execute();
        $hash = $requete->fetch()[0];

        return $hash;
    }


    public function createAccount($account)
    {
        if (isset($_POST['register'])) {
            $login  = $_POST['username'];
            $nom      = $_POST['nom'];
            $password  = password_hash($_POST['password'], PASSWORD_BCRYPT);


            $_SESSION['username'] = $login;

            $requete = $this->database->getBdd()->prepare("INSERT INTO comptes (login, hash, nom, statut) VALUES (:login, :hash , :nom, :statut)");


            $requete->bindParam(':login', $login);
            $requete->bindParam(':hash', $password);
            $requete->bindParam(':nom', $nom);
            $requete->bindParam(':statut', $account->getStatut());

            $requete->execute();


            $account = new Account($login, $password, $nom);
        }
        return $account;
    }

}