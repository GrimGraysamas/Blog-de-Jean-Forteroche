<?php 

require_once('model/postmanager.php');
require_once('model/commentmanager.php');

// POSTS functions

function listPosts() {
    $postManager = new PostManager();
    $posts = $postManager->readLatestPosts();

    $commentManager = new CommentManager();
    $comments = $commentManager->readFirstComments();

    require('views/homeView.php');
}

function readPost() {
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->readPost($_GET['postid']);
    $comments = $commentManager->readComments($_GET['postid']);

    require('view/postView.php');
}