<?php 

require_once('models/manager.php');

class UserManager extends manager
{
    public function createAccount($username, $password) {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO accounts(username, password) VALUES(?, ?)');
        $output = $req->execute(array($username, hash('sha512', $password)));

        return $output;
    }
    
    public function readAccount($username) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM accounts WHERE username = ?');
        $req->execute(array($username));
        $data = $req->fetch();

        return $data;
    }

    public function updateAccount($username, $newpwd) {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE accounts SET  password = ? WHERE username = ?');
        $output = $req->execute(array($newpwd, $username));

        return $output;
    }

    public function deleteAccount($username) {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM accounts WHERE username = ?');
        $output = $req->execute(array($username));

        return $output;
    }
    
    public function getUsernames() {
        $db = $this->dbConnect();
        $req = $db->query('SELECT username FROM accounts');
        $data = $req->fetch();

        return $data;
    }
}