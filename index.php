<?php

session_start();

require('controller/backend.php');
require('controller/frontend.php');

try {
    listPosts();
}
catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}