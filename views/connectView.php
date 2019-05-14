<?php $title = 'Blog de Jean Forteroche - Connexion'; ?>

<?php ob_start(); ?>
<section class="section">
    <h6 class="title">Se connecter :</h6>
    <form class=" container is-small is-vertical" action="index.php?action=connect" method="post">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username">
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password">
        <input type="submit">
    </form>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>