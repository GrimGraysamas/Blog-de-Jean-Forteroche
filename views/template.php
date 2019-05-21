<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title><?= $title ?></title>
        <link href="https://fonts.googleapis.com/css?family=Lobster|Raleway" rel="stylesheet">
        <link href="public/style/CSS/main.css" rel="stylesheet" /> 
    </head>
        
    <body class="marginless paddingless fullCentered" id="bodybg">
        <section class="bgprimary" id="main">  
            <?php require('header.php'); ?>
            <?= $content ?> 
            <?php require('footer.php'); ?>
        </section>  
    </body>  
</html>