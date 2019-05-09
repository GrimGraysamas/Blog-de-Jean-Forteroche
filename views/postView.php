<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start();?>

<section class="hero has-navbar">
    <div class="container is-vertical is-large">
        <h2 class="title M50top M50bottom noMleft"><?= htmlspecialchars($post['title']); ?></h2>
        <h6 class="subtitle M25bottom M25top noMleft">Ecrit par <strong><?= htmlspecialchars($post['author']); ?></strong> le <?= htmlspecialchars($post['postingtime']); ?></h6>
        <div class="container is-large M50left">
            <p class="is-1"><?= htmlspecialchars($post['content']); ?></p>
        </div>
    </div>
</section>
<section class="section is-small noMtop">
    <form class="container is-vertical is-medium" action="index.php?action=addcomment&amp;postid=<?= $post['id'] ?>" method="post">
        <h2 class="subtitle">Ajouter un commentaire :</h2>
        <div class="container is-horizontal marginless alignEnd P25">
            <div class="container alignCenter is-vertical marginless P25">
                <label for="author">Auteur :</label>
                <input class="bordernone borderB contentadd1" type="text" id="author" name="author">
            </div>
            <div class="container is-vertical marginless P25">
                <label for="comment">Commentaire :</label>
                <textarea class="bordernone borderB contentadd1" name="comment" id="comment" rows="1" cols="200"></textarea>
            </div>
            <div>
                <input class="button is-rounded is-outlined primary-add1" type="submit" value="Soumettre">
            </div>
        </div>
    </form>
</section>
<section class="section P50top P50bottom">
    <h1 class="subtitle P50bottom M25left">Commentaires :</h1>
    <?php
    while ( $data = $comments->fetch())
    {
    ?>
    <div class="container is-full spaceBetween marginless alignCenter">
        <div class="container is-vertical marginless M50left">
            <div class="container marginless M25bottom alignEnd">
                <h4 class="subtitle noMbottom"><?= htmlspecialchars($data['author']); ?></h4>
                <p class="noMbottom M25left">le <?= htmlspecialchars($data['postingtime']); ?></p>
            </div>
            <div class="container marginless M50left"><p><?= htmlspecialchars($data['content']); ?></p></div>
        </div>
        <a class="button is-small is-rounded is-outlined primary-secondary textdecorationnone M50right" href="index.php?action=report&amp;commentid=<?= $data['id'] ?>&amp;postid=<?= $post['id'] ?>">Signaler</a>
    </div>
    
    <?php  
    }
    $comments->closeCursor();
    ?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>