<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title><?= $title ?></title>
        <link href="https://fonts.googleapis.com/css?family=Lobster|Raleway" rel="stylesheet">
        <link href="public/style/CSS/main.css" rel="stylesheet" /> 
    </head>
        
    <body class="marginless paddingless bgprimary">
        <?php require('header.php'); ?>
        <a class="M50left" href="index.php">Retourner au site</a>
        <?= $content ?> 
    </body>  
</html>