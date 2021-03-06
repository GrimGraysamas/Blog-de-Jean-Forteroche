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

function administrate() 
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
    if (isset($_SESSION['username'])) {
        $postManager = new PostManager();
        $post = $postManager->readPost($_GET['postid']);
        
        require('views/editpostView.php');
    }
    else {
        throw new Exception("Vous n'êtes pas autorisé à accéder à cette page !");
    }

}

function updatePost() {
    $postManager = new PostManager();
    if (isset($_SESSION['username'])) {
        $update = $postManager->updatePost($_GET['postid'], $_POST['posttitle'], $_POST['postcontent']);
    
        if ($update == false) {
            throw new Exception('Impossible de mettre à jour le billet !');
        }
        else {
            header('Location:index.php?action=readpost&postid=' . $_GET['postid']);
        }
    }
    else {
        throw new Exception("Vous n'êtes pas autorisé à effectuer cette action !");
    }
}

function deletePost() {
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    if (isset($_SESSION['username'])) {
        $post = $postManager->deletePost($_GET['postid']);
        
        if ($post == false) {
            throw new Exception('Impossible de supprimer le billet !');
        }
        else {
            header('Location:index.php?action=admin');
        }
    }
    else {
        throw new Exception("Vous n'êtes pas autorisé à effectuer cette action !");
    }

}

function deleteComment() {
    $commentManager = new CommentManager();

    if (isset($_SESSION['username'])) {
        $comment = $commentManager->deleteComment($_GET['commentid']);
    
        if ($comment == false) {
            throw new Exception('Impossible de supprimer le commentaire');
        }
        else {
            header('Location:index.php?action=admin');
        }
    }
    else {
        throw new Exception("Vous n'êtes pas autorisé à effectuer cette action !");
    }
}