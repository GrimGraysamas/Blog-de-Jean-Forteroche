<?php

session_start();

require('controllers/backend.php');
require('controllers/frontend.php');

try {
    listPosts();
}
catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}