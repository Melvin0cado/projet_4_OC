<?php ob_start(); ?>
<h1>Blog de Jean Forteroche</h1>
<script>
    tinymce.init({
        selector: '#createPost',
        menubar: 'edit view format',
    });
</script>
<?php
    if (isset($_SESSION['admin'])) {
?>
    <form method="post" action="index.php?action=create_post">
        <input name="title" type="text" placeholder="Titre" required>
        <input name="author" type="text" value="Jean Forteroche" disabled />
        <input name="author" type="text" value="Jean Forteroche" hidden />
        <textarea name="post" id="createPost"></textarea>
        <input name="submit" type="submit" value="Valider"/>
    </form>
<?php
    }
    if (count($posts) > 0) {
        foreach ($posts as $post) {
?>
<?php
            require("template/templatePost.php");
?>
<?php
        }
    }
    $content = ob_get_clean();

    require('template/template.php');
?>
