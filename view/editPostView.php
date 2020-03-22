<?php ob_start(); ?>
<h1>Modifier le post</h1>
<br />
<script>
    tinymce.init({
        selector: '#editPost',
        menubar: 'edit view format'
    })
</script>
<form method="post" action="index.php?action=edit_post&postId=<?= $post['id'] ?>">
    <input name="title" type="text" placeholder="Titre" value=<?= $post['title'] ?>>
    <input name="author" type="text" value="Jean Forteroche" disabled />
    <input name="author" type="text" value="Jean Forteroche" hidden />
    <textarea  id="editPost" name="post">
        <?= $post['content'] ?>
    </textarea>
    <input name="edit" type="submit" value="Modifier" />
</form>
<br />
<?php
    $content = ob_get_clean();

    require('template/template.php');
?>
