<?php

require_once("models/commentmanager.php");
require_once("models/postmanager.php");
require_once("models/usermanager.php");

function connect($username, $password) {
    $userManager = new UserManager();
    $usernames = $userManager->getUsernames();
    
    if (in_array($username, $usernames)) {
        $accountdata = $userManager->readAccount($username);
        $goodpassword = $accountdata['password'];

        if ($goodpassword == hash('sha512', $password)) {
            $_SESSION['username'] = $username;
            header('Location:index.php?action=admin');
        }
        else {
            throw new Exception('Le mot de passe est incorrect !');
        }
    }
    else {
        throw new Exception('Le nom d\'utilisateur est inconnu !');
    }
}

function administrate($username) 
{
    $userManager = new UserManager();

    if (isset($_SESSION['username'])) {
        $postManager = new PostManager();
        $posts = $postManager->readAllPosts();  
        $lastid = $postManager->getLastId();

        $commentManager = new CommentManager();
        $comments = $commentManager->readAllComments();
        require('views/adminView.php');
    }
    else {
        require('views/connectView.php');
    }
}

function createPost() {
    $postManager = new PostManager();

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $post = $postManager->createPost($username, "", "");

        if ($post == false) {
            throw new Exception('Impossible d\'ajouter le billet');
        }
        else {
            $lastpostid = $postManager->getLastId();
            header('Location:index.php?action=editpost&postid=' . $lastpostid['id']);
        }
    }
}

function editPost() {
    $postManager = new PostManager();
    $post = $postManager->readPost($_GET['postid']);

    require('views/editpostView.php');
}

function updatePost() {
    $postManager = new PostManager();
    $update = $postManager->updatePost($_GET['postid'], $_POST['posttitle'], $_POST['postcontent']);

    if ($update == false) {
        throw new Exception('Impossible de mettre à jour le commentaire !');
    }
    else {
        header('Location:index.php?action=readpost&postid=' . $_GET['postid']);
    }
}

function deletePost() {
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->deletePost($_GET['postid']);
    $comments = $commentManager->deleteComments($_GET['postid']);

    if ($post == false && $comments == false) {
        throw new Exception('Impossible de supprimer le billet !');
    }
    else {
        header('Location:index.php?action=admin');
    }
}