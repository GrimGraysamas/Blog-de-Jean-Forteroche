<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start();?>

<section class="fullCentered">
    <div class="container is-full wrap fullCentered">
    <?php 
        while ( $data = $posts->fetch())
        {
    ?>
        <div class="container is-vertical is-small border billet">
            <h6 class="title noMleft billettitre"><?= $data['title'] ?></h6>
            <p class="noMleft billetinfos">par <strong><?= $data['author'] ?></strong> - le <?= $data['postingtime'] ?>.</p>
            <div class=" noMleft divider bgadd1"></div>
            <h6 class="subtitle noMleft billetcontenu"><?= mb_strimwidth($data['content'], 0, 500, "...")?></h6>
            <a href="index.php?action=readpost&amp;postid=<?= $data['id'] ?>" class="billetlien">Lire plus...</a>
        </div>
    <?php 
        }
        $posts->closeCursor();
    ?>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>