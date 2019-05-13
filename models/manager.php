<?php

class Manager
{
    protected function dbConnect() {
        $db = new PDO('mysql:host=db5000024306.hosting-data.io; dbname=dbs19544', 'dbu29033', 'JSBpjbscrmpbtd159!', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }

    public function getElement($tablename, $name) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT ? FROM ? ORDER BY id DESC');
        $req->execute(array($name, $tablename));
        $data = $req->fetch();

        return $data;
    }

    public function search($search) {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT * FROM posts WHERE title LIKE '%?%' OR author LIKE '%?%' OR content LIKE '%?%' OR postingtime LIKE '%?%'");
        $req->execute(array($search, $search, $search, $search));

        return $req;
    }
}