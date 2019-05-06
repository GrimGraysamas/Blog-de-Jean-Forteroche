<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title><?= $title ?></title>
        <link href="public/style/CSS/main.css" rel="stylesheet" /> 
    </head>
        
    <body class="bgprimary marginless paddingless">
        <?php require('header.php'); ?>
        <?= $content ?>
        <?php require('footer.php'); ?>
    </body>
</html>