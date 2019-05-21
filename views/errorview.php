<?php $title = "Blog de Jean Forteroche - Erreur"?>

<?php ob_start(); ?>

<section class="section is-medium">
    <div class="container marginless is-full is-vertical">
        <h2 class="title contentadd1 P50left">Erreur :</h2>
        <h4 class="subtitle M50left P50left"><?= $error ?></h4>
        <a class="M50left M50top P50left" href="index.php">Retour à l'accueil</a>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>