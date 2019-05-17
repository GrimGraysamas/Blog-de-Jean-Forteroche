<?php $title = "Blog de Jean Forteroche - Erreur"?>

<?php ob_start(); ?>

<section class="section is-small">
    <div class="container is-vertical">
        <h2 class="title contentadd1">Erreur :</h2>
        <h4 class="subtitle M50left"><?= $error ?></h4>
        
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>