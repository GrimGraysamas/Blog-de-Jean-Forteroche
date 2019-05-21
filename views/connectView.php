<?php $title = 'Blog de Jean Forteroche - Connexion'; ?>

<?php ob_start(); ?>
<section class="section" id="connexionsection">
    <h6 class="title P50left" id="connexion">Se connecter :</h6>
    <div class="container is-full marginless"  id="connexionform">
        <form class="container is-small is-vertical" action="index.php?action=connect" method="post">
            <label for="username" id="usernamelabel">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username">
            <label for="password" id="passwordlabel">Mot de passe :</label>
            <input type="password" id="password" name="password">
            <input type="submit">
        </form>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>