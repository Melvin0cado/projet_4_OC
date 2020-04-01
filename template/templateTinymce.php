<?php

    if ($_GET['action'] === 'create_post' || $_GET['action'] === 'postList') {
        $action = 'action=create_post' ;
    } elseif ($_GET['action'] === 'edit_post') {
        $action = 'action=edit_post&postId='.$post['id'];
    }

    $postTitle = '';
    $postContent = '';

    if (isset($post)) {
        $postTitle = $post['title'];
        $postContent = $post['content'];
    }

    if (isset($_SESSION['admin'])) {
        ?>
    <script src="asset/js/tinymce.js" ></script>
    <form method="post" action="index.php?<?= $action ?>" >
    <div class="row mb-2">
        <div class="col">
            <input class="form-control" name="title" type="text" placeholder="Titre" value="<?= $postTitle ?>" required>
        </div>
        <div class="col">
            <input class="form-control" name="author" type="text" value="Jean Forteroche" readonly />
        </div>
    </div>
        <input name="author" type="text" value="Jean Forteroche" hidden />
        <textarea id="tinymce" class="mb-1" name="post" id="tinymce">
            <?= $postContent ?>
        </textarea>
        <input class="btn btn-primary" name="submit" type="submit" value="Valider"/>
    </form>
<?php
    }
?>