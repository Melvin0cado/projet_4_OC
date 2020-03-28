<?php ob_start(); ?>
<div>
<?php if (isset($post)) {

    require("template/templatePost.php");

?>
<h2>Commentaires : </h2>
<form method="post" action="index.php?action=create_comment&postId=<?= $post['id'] ?>">
    <input name="pseudo" type="text" placeholder="Pseudo" required />
    <br />
    <textarea name="comment" class="comment" required></textarea>
    <br />
    <input name="submit" type="submit" value="Valider" />
</form>
<?php
    foreach ($commentList as $comment) { ?>
    <div class="comments">
        <h3>
            <em> auteur : <?= $comment['author'] ?>, crée le : <?= date('Y-m-d G:i', strtotime($comment['created_at']))?>, signalement : <?= $comment['report_number'] ?></em>
        <?php if (!isset($_SESSION['admin'])) { ?>
            <a href="index.php?action=report&commentId=<?= $comment['id'] ?>&postId=<?= $post['id'] ?>&report_number=<?= $comment['report_number'] ?>" >
                Signaler
            </a>
        <?php } ?>
        <?php if (isset($_SESSION['admin'])) { ?>
            <a href="index.php?action=removeComment&commentId=<?= $comment['id'] ?>&postId=<?= $post['id'] ?>" >
                Supprimer le commentaire
            </a>
        <?php } ?>
        </h3>
        <p>
            <?= htmlspecialchars($comment['content']) ?>
            <br />
        </p>
    </div>
<?php }
} ?>
</div>
<?php
    $content = ob_get_clean();

    require('template/template.php');
?>