<?php $title = "Blog de Jean Forteroche - Administration"?>

<?php ob_start(); ?>

<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=yxucfdbtd4v64ic8aalugq2hrwf7zhbjsj6p4yznvhuan5ws"></script>
<script>
  tinymce.init({
    selector: '#postcontent'
  });
</script>

<section class="container noMtop M25top is-vertical">
  <form action="index.php?action=applychanges&amp;postid=<?= $post['id'] ?>" method="POST" class="flexColumn">
    <textarea type="text" id="posttitle" name="posttitle" placeholder="Titre du billet" class="is-1 is-full"><?= $post['title'] ?></textarea>
    <textarea name="postcontent" id="postcontent" rows="50" placeholder="Contenu du billet"><?= $post['content'] ?></textarea>
    <button class="button is-rounded add1-primary is-outlined" type="submit" name="submit" id="submit">Confirmer les changements</button>
  </form>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('admintemplate.php'); ?>