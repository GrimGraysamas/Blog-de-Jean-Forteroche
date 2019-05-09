<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start();?>

<section class="hero columns has-navbar">
    <div class="column is-full fullCentered">
        <h6 class="title">Bienvenue sur le blog de Jean Forteroche !</h6>
    </div>
   <div class="column is-4-9 offset-1-9">
        <h3 class="subtitle">Consulter les derniers billets :</h3>
        <div class="container is-vertical">
            <?php
            while ( $data = $posts->fetch())
            {
            ?>
                <?= $data['title'] ?>
                <p>écrit par <?= $data['author'] ?>, le <?= $data['postingtime'] ?></p>
                <?= mb_strimwidth($data['content'], 0, 50, "...")?>
                <a href="index.php?action=readpost&amp;postid=<?= $data['id'] ?>">Lire plus...</a>
            <?php
            }
            $posts->closeCursor();
            ?>
        </div>
        
   </div>
    
    <div class="column is-3-9">
            <div class="container">
                <h6 class="subtitle"><u>Derniers commentaires :</u></h6>
            </div>
            <div class="container is-vertical">
            <?php
            while ( $data = $comments->fetch())
            {
            ?>
                <p>écrit par <?= $data['author'] ?>, le <?= $data['postingtime'] ?></p>
                <?= $data['content'] ?>
            <?php
            }
            $comments->closeCursor();
            ?>
            </div>
    </div>

    
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>