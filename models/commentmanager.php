<?php
require_once('models/manager.php');

class CommentManager extends Manager
{
    public function createComment($postId, $author, $content) {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO comments(author, content, postid, postingtime) VALUES(?,?,?, NOW())');
        $output = $req->execute(array($author, $content, $postId));

        return $output;
    }

    public function readComment($postId, $commentId) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM comments WHERE postid = ? AND id = ?');
        $req->execute(array($postId, $commentId));
        $data = $req->fetch();

        return $data;
    }

    public function readComments($postId) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM comments WHERE postid = ?');
        $req->execute(array($postId));
        $data = $req->fetch();

        return $data;
    }

    public function updateComment($commentId, $name, $value) {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET ? = ? WHERE id = ?');
        $output = $req->execute(array($name, $value, $commentId));

        return $output;
    }

    public function deleteComment($postId, $commentId) {
        $db=$this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE postid = ? AND id = ?');
        $output = $req->execute(array($postId, $commentId));

        return $output;
    }

    public function reportComment($commentId) {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET reports = reports + 1 WHERE id = ?');
        $output = $req->execute(array( $commentId));
  
        return $output;
    }

    public function  readFirstComments() {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM comments ORDER BY postingtime DESC LIMIT 5');

        return $req;
    }
    
}