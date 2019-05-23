<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start();?>

<section>
    <div class="container marginless is-vertical is-full">
        <h3 class="title M50top M50bottom P50left noMleft"><?= htmlspecialchars($post['title']); ?></h3>
        <h6 class="subtitle M25bottom M25top noMleft P50left">Ecrit par <strong class="contentadd1"><?= htmlspecialchars($post['author']); ?></strong> le <?= htmlspecialchars(date("j/n/Y, à G:i" , strtotime($post['postingtime']))); ?></h6>
        <div class="container marginless is-medium M50top M50left is-vertical">
          <?= $post['content'] ?>
        </div>
    </div>
</section>
<section class="noMtop noMbottom">
    <form class="container is-vertical is-medium" action="index.php?action=addcomment&amp;postid=<?= $post['id'] ?>" method="post">
        <h1 class="subtitle is-full">Ajouter un commentaire :</h1>
        <div class="container columns is-horizontal marginless alignEnd P25left P25top P25bottom">
            <div class="container column is-1-4 is-vertical marginless">
                <label for="author">Auteur :</label>
                <input class="bordernone" type="text" id="author" name="author">
                <div class="divider bgadd1 noMleft noMtop"></div>
            </div>
            <div class="container column is-1-2 is-vertical marginless">
                <label for="comment">Commentaire :</label>
                <textarea class="bordernone" name="comment" id="comment" rows="1"></textarea>
                <div class="divider bgadd1 noMleft noMtop"></div>
            </div>
            <div class="column is-1-4"> 
                <input class="button is-rounded is-outlined primary-add1" type="submit" value="Soumettre">
            </div>
        </div>
    </form>
</section>
<section class="P50bottom">
    <h1 class="subtitle P50bottom M25left">Commentaires :</h1>
    <?php
    while ( $data = $comments->fetch())
    {
    ?>
    <div class="container is-full spaceBetween marginless alignCenter">
        <div class="container is-vertical marginless M50left">
            <div class="container marginless M25bottom alignEnd">
                <h4 class="subtitle noMbottom"><strong class="contentadd1"><?= htmlspecialchars($data['author']); ?></strong></h4>
                <p class="noMbottom M25left"> le <?= htmlspecialchars(date("j/n/Y, à G:i" , strtotime($data['postingtime']))); ?></p>
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