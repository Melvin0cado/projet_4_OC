<?php ob_start(); ?>
<h1>Blog de Jean Forteroche</h1>
<br />
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
    <textarea name="post" id="createPost" required></textarea>
    <input name="submit" type="submit" value="valider" required/>
</form>
<br />
<?php
    }
?>
<p>Derniers billets du blog :</p>
<?php
    if (count($posts) > 0) {
        foreach ($posts as $post) {
            ?>
    <div class="rounded">
         <h3 class="titlePost">
            titre : <?=  $post['title'] ?>, 
            auteur : <em><?= $post['author'] ?></em>
        </h3>
        <?php
            if (isset($_SESSION['admin'])) {
                ?>
        <form method="post" action="index.php?action=delete_post&postId=<?= $post['id'] ?>">
            <input name="delete" type="submit" value="Supprimer" />
        </form>
        <a href="index.php?action=edit_post&postId=<?= $post['id'] ?>">
            Modifier
        </a>
        <?php } ?>
        <?= $post['content'] ?>
        <a href="index.php?action=read_post&postId=<?= $post['id'] ?>">
            lire la suite
        </a>
        <br />
    </div>
<?php
        }
    }
    $content = ob_get_clean();

    require('template/template.php');
?>
