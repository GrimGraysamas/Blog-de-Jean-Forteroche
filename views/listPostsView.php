<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start();?>

<section>
    <div class="container is-vertical">
    <?php 
        while ( $data = $posts->fetch())
        {
    ?>
        <div class="container is-vertical">
            <h6 class="title"><?= $data['title'] ?></h6>
            <p>écrit par <?= $data['author'] ?>, le <?= $data['postingtime'] ?>.</p>
            <p><?= mb_strimwidth($data['content'], 0, 200, "...")?></p>
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