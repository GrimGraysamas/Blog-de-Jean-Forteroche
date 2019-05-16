<?php $title = "Blog de Jean Forteroche - Administration"?>

<?php ob_start(); ?>

<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=yxucfdbtd4v64ic8aalugq2hrwf7zhbjsj6p4yznvhuan5ws"></script>
<script>
  tinymce.init({
    selector: '#postedit'
  });
</script>

<form method="post">
    <textarea name="" id="postedit" cols="150" rows="55"></textarea>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>