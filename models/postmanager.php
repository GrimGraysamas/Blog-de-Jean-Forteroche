<?php

require_once('models/manager.php');

class PostManager extends manager
{
    public function createPost($author, $title, $content) {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(author,title,content,postingtime) VALUES(?,?,?, NOW())');
        $output = $req->execute(array($author, $title, $content));

        return $output;
    }

    public function readPost($postId) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, title, content, postingtime FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $data = $req->fetch();

        return $data;
    }

    public function updatePost($postId, $newtitle, $newcontent) {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title = ?, content = ?, postingtime = NOW() WHERE id = ?');
        $output = $req->execute(array($newtitle, $newcontent, $postId));

        return $output;
    }

    public function deletePost($postId) {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE id = ?');
        $output = $req->execute(array($postId));

        return $output;
    }

    public function readLatestPosts() {
        $db = $this->dbConnect();  
        $req = $db->query('SELECT * FROM posts ORDER BY postingtime DESC LIMIT 5');

        return $req;
    }

    public function readFirstPost() {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM posts ORDER BY postingtime ASC LIMIT 1');

        return $req;
    }

    public function getLastId() {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id FROM posts ORDER BY id DESC LIMIT 1');
        $data = $req->fetch();

        return $data;
    }

    public function readAllPosts() {
        $db = $this->dbConnect();  
        $req = $db->query('SELECT * FROM posts ORDER BY postingtime ASC');

        return $req;
    }

}