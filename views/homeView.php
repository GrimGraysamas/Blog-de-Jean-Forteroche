<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start();?>

<section class="columns">
    <div class="container marginless is-medium column is-full M50top M50bottom fullCentered" id="slider">
        <h2 class="title contentprimary">"Billet simple pour l'Alaska"</h2>
    </div>
   <div class="column is-4-9 offset-1-9" id="derchaps">
        <h3 class="subtitle">Lire les derniers chapitres :</h3>
        <div class="container is-vertical">
            <?php
            while ( $data = $posts->fetch())
            {
            ?>
            <div class="container marginless is-vertical M50bottom">
                <h4 class="subtitle noMleft"><?= $data['title'] ?></h4>
                <h6 class="subtitle M25left M25top"><?= mb_strimwidth($data['content'], 0, 350, "...")?></h6>
                <p><em>écrit par <?= $data['author'] ?>, le <?= date("j/n/Y, à G:i" , strtotime($data['postingtime'])) ?></em></p>
                <a href="index.php?action=readpost&amp;postid=<?= $data['id'] ?>">Lire plus...</a>
            </div>
            <?php
            }
            $posts->closeCursor(); 
            ?>
        </div>  
        
    </div>
    
    <div class="column is-1-3" id="dercoms">
        <div class="container noMbottom M25bottom">
            <h6 class="subtitle" id="titrecoms"><u>Derniers commentaires :</u></h6>
        </div>
        <div class="container marginless is-vertical">
        <?php
        while ( $data = $comments->fetch())
        {
        ?>
        <div class="container marginless P25left P50right is-vertical">
            <p><strong><?= $data['author'] ?></strong>, le <?= date("j/n/Y, à G:i" , strtotime($data['postingtime'])) ?></p>
            <?= $data['content'] ?>
        </div>
        <?php
        }
        $comments->closeCursor();
        ?>  
        </div>
    </div>

    
</section>
<div class="divider bglight"></div>
<section class="container is-full marginless is-vertical fullCentered">
    <?php 
        while ($data = $post->fetch())
        {
    ?>
    <h3 class="title M50bottom"><?= $data['title'] ?></h3>
    <h6 class="subtitle M50left M50right"><?= $data['content'] ?></h6>
    <?php 
        }
        $post->closeCursor();
    ?>
    <a href="index.php?action=listallposts" class="is-2 M50top contentadd1">Lire la suite du roman !</a>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>