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
            <p><?= $data['content'] ?></p>
            <a href="index.php?action=readpost&amp;postid=<?= $data['id'] ?>">Lire plus...</a>
        </div>
    <?php 
        }
        $posts->closeCursor();
    ?>
    </div>
</section>

    <?php 
        while ( $data = $posts->fetch())
        {
    ?>
        <?= $data['title'] ?>
        <?= $data['author'] ?>
        <?= $data['postingtime'] ?>
        <?= $data['content'] ?>
    <?php 
        }
        $posts->closeCursor();
    ?>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>