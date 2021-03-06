<?php

session_start();

require('controllers/backend.php');
require('controllers/frontend.php');

try { 
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'readpost') {
            if (isset($_GET['postid']) && $_GET['postid'] > 0) {
                readPost();
            }
            else {
                throw new Exception('Aucun billet sélectionné');
            }
        }
        elseif ($_GET['action'] == 'listallposts') {
            listAllPosts();
        }
        elseif ($_GET['action'] == 'addcomment') {
            if (isset($_GET['postid']) && $_GET['postid'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    postComment($_GET['postid'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun billet choisi');
            }
        }
        elseif ($_GET['action'] == 'report') {
            if (isset($_GET['commentid']) && $_GET['commentid'] > 0 && isset($_GET['postid']) && $_GET['postid'] > 0) {
                reportComment($_GET['postid'], $_GET['commentid']);
            }
            else {
                throw new Exception('Aucun commentaire sélectionné');
            }
        }
        elseif ($_GET['action'] == 'admin') {
            administrate();
        }
        elseif ($_GET['action'] == 'connect') {
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                connect($_POST['username'], $_POST['password']);
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'createpost') {
            createPost();
        }
        elseif ($_GET['action'] == 'editpost') {
            if (isset($_GET['postid']) && $_GET['postid'] > 0) {
                editPost();
            }
            else {
                throw new Exception('Aucun billet sélectionné !');
            }
        }
        elseif ($_GET['action'] == 'deletepost') {
            if (isset($_GET['postid']) && $_GET['postid'] > 0) {
                deletePost();
            }
            else {
                throw new Exception('Aucun billet sélectionné !');
            }
        }
        elseif ($_GET['action'] == 'applychanges') {
            if (isset($_GET['postid']) && $_GET['postid'] > 0) {
                updatePost();
            }
            else {
                throw new Exception('Aucun billet sélectionné !');
            }
        }
        elseif ($_GET['action'] == 'deletecomment') {
            if (isset($_GET['commentid']) && $_GET['commentid'] > 0) {
                deleteComment();
            }
            else {
                throw new Exception('Aucun commentaire sélectionné !');
            }
        }
    }
    else {
        listLatestPosts();
    }
}
catch (Exception $e) {
    // echo 'Erreur : ' . $e->getMessage();
    $error = $e->getMessage();
    require('views/errorview.php');
}