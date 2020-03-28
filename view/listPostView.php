<?php ob_start(); ?>
<div>
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
    <input name="submit" type="submit" value="valider"/>
</form>
<?php
    }
    if (count($posts) > 0) {
        foreach ($posts as $post) {
            ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3 class="card-title">
                titre : <?=  $post['title'] ?>
            </h3>
            <span class="card-subtitle mb-2 text-muted"><em><?= $post['author'] ?>, le <?= date('d/m/Y' ,strtotime($post['created_at'])) ?></em></span>
        </div>
        
        <div class="card-body">
            <?= $post['content'] ?>
        <div class="d-flex justify-content-end">
            <a class="btn btn-primary" href="index.php?action=read_post&postId=<?= $post['id'] ?>">
                lire la suite
            </a>
            <?php
            if (isset($_SESSION['admin'])) {
                ?>
        <a class="btn btn-primary" href="index.php?action=edit_post&postId=<?= $post['id'] ?>">
            Modifier
        </a>
        <a class="btn btn-danger" href="index.php?action=delete_post&postId=<?= $post['id'] ?>">
            Supprimer
        </a>
        <?php
            } ?>
        </div>
        </div>
    </div>
</div>
<?php
        }
    }
    $content = ob_get_clean();

    require('template/template.php');
?>
