<?php 

require_once('models/postmanager.php');
require_once('models/commentmanager.php');

// POSTS functions

function listLatestPosts() {
    $postManager = new PostManager();
    $posts = $postManager->readLatestPosts();

    $commentManager = new CommentManager();
    $comments = $commentManager->readLatestComments();

    require('views/homeView.php');
}

function listAllPosts() {
    $postManager = new PostManager();
    $posts = $postManager->readAllPosts();

    require('views/listPostsView.php');
}

function readPost() {
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->readPost($_GET['postid']);
    $comments = $commentManager->readComments($_GET['postid']);

    if ($post['title'] != "") {
        require('views/postView.php');
    }
    else {
        throw new Exception("Le billet sélectionné n'existe pas !");
    }

}

// COMMENTS functions

function postComment($postid, $author, $content) {
    $commentManager = new CommentManager();
    $comment = $commentManager->createComment($postid, $author, $content);

    if ($comment === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=readpost&postid=' . $postid);
    }
}

function reportComment($postid, $commentid) {
    $commentManager = new CommentManager();
    $report = $commentManager->reportComment($commentid);

    if ($report === false) {
        throw new Exception('Impossible de signaler le commentaire !');
    }
    else {
        header('Location: index.php?action=readpost&postid=' . $postid);
    }
}