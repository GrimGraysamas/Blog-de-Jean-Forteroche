<?php $title = "Blog de Jean Forteroche - Erreur"?>

<?php ob_start(); ?>

<section class="section is-medium">
    <div class="container is-large is-vertical">
        <h2 class="title contentadd1">Erreur :</h2>
        <h4 class="subtitle M50left"><?= $error ?></h4>
        <a class="M50left M50top" href="index.php">Retour à l'accueil</a>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>