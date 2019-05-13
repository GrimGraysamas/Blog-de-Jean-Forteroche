<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start();?>

<section class="fullCentered">
    <div class="container is-large wrap">
    <?php 
        while ( $data = $posts->fetch())
        {
    ?>
        <div class="container is-vertical is-small">
            <h6 class="title noMleft"><?= $data['title'] ?></h6>
            <p class="noMleft">écrit par <?= $data['author'] ?>, le <?= $data['postingtime'] ?>.</p>
            <div class=" noMleft divider bgadd1"></div>
            <p class="noMleft"><?= mb_strimwidth($data['content'], 0, 200, "...")?></p>
            <a href="index.php?action=readpost&amp;postid=<?= $data['id'] ?>">Lire plus...</a>
        </div>
    <?php 
        }
        $posts->closeCursor();
    ?>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>