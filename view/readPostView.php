<?php ob_start(); ?>
<h1>Post</h1>
<?php
    if (isset($post)) {
        ?>
    <div>
        <h3>
            titre : <?= $post['title'] ?>,
            auteur du post : <em><?= $post['author'] ?>, post crée le :  <?= date('Y-m-d G:i', strtotime($post['created_at'])) ?></em>
        </h3>
        <p>
            <?= $post['content'] ?>
            <br />
        </p>
    </div>
    <div>
        <h2>Commentaires : </h2>
        <form method="post" action="index.php?action=create_comment&postId=<?= $post['id'] ?>">
            <input name="date" type="text" value="<?= date('c') ?>" hidden />
            <input name="pseudo" type="text" placeholder="Pseudo" required />
            <br />
            <textarea name="comment" class="comment" required></textarea>
            <br />
            <input name="submit" type="submit" value="valider" required />
        </form>
    </div>
<?php
    foreach ($commentList as $comment) {
        ?>
<div class="comments">
    <h3>
        <em> auteur : <?= $comment['author'] ?>, crée le : <?= date('Y-m-d G:i', strtotime($comment['created_at']))?>, signalement : <?= $comment['report_number'] ?></em>
    </h3>
    <form method="post" action="index.php?action=report&commentId=<?= $comment['id'] ?>&postId=<?= $post['id'] ?>" >
        <input name="report_number" value=<?= $comment['report_number'] ?> hidden />
        <input name="report" type="submit" value="signaler" />
    </form>
    <p>
        <?= htmlspecialchars($comment['content']) ?>
        <br />
    </p>
 </div>
<?php
    }
    }
    $content = ob_get_clean();

    require('template/template.php');
?>