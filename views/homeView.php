<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start();?>

<section class="hero columns">
    <div class="column is-full">
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
            <?php
            }
            $posts->closeCursor();
            ?>
        </div>
        
   </div>
    
    <?php
    while ( $data = $comments->fetch())
    {
    ?>

    <?php
    }
    $comments->closeCursor();
    ?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>