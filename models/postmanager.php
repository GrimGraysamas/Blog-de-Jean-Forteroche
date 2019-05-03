<?php

require_once('model/manager.php');

class PostManager extends manager
{
    public function createPost($author, $title, $content) {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(author,title,cotent,postingtime) VALUES(?,?,?, NOW())');
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

    public function updatePost($postId, $name, $value) {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET ? = ? WHERE id = ?');
        $output = $req->execute(array($name, $value, $postId));

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

}