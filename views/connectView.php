<?php $title = 'Blog de Jean Forteroche - Connexion'; ?>

<?php ob_start(); ?>
<section class="section M50left P25left">
    <h6 class="title">Se connecter :</h6>
    <div class="container is-large marginless">
        <form class=" container is-small is-vertical" action="index.php?action=connect" method="post">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password">
            <input type="submit">
        </form>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>