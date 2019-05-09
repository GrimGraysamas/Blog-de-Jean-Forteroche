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
    }
    else {
        listLatestPosts();
    }
}
catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}