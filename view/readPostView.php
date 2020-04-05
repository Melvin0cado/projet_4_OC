<?php ob_start(); ?>
<div>
<?php if (isset($post)) {
    require("template/templatePost.php");
    if(!isset($_SESSION['admin'])) { ?>

    <form class="my-2" method="post" action="index.php?action=create_comment&postId=<?= $post['id'] ?>">
        <div class="row mb-2">
            <div class="col-2">
                <input class="form-control" name="pseudo" type="text" placeholder="Pseudo" required />
            </div>
        </div>
        <textarea class="form-control mb-2 comment" name="comment" placeholder="Ecrit ton commentaire ici..." required></textarea>
        <input class="btn btn-primary" name="submit" type="submit" value="Valider" />
    </form>
    <?php  }?>
    <div id="comment" class="card mt-2">
        <div class="card-header bg-dark text-light">
            Commentaires
        </div>
<?php

    $i =0;
    foreach ($commentList as $comment) { ?>

        <div class="card-header d-flex justify-content-between">
            <em> De <?= $comment['author'] ?>, le <?= date('Y-m-d à G:i', strtotime($comment['created_at']))?></em>
            <div>
                <a href="<?= (!isset($_SESSION['admin'])) ? 'index.php?action=report&commentId='.$comment['id'].'&postId='.$post['id'].'&report_number='.$comment['report_number'] : "#" ?>" class="btn btn-primary text-light">
                    <?= (!isset($_SESSION['admin'])) ? 'Signaler' : 'Signalement' ?> <span class="badge badge-light"><?= $comment['report_number'] ?></span>
                </a>
        <?php if (isset($_SESSION['admin'])) { ?>
                <a class="btn btn-danger" href="index.php?action=removeComment&commentId=<?= $comment['id'] ?>&postId=<?= $post['id'] ?>" >
                    Supprimer le commentaire
                </a>
        <?php } ?>
            </div>
        </div>
        <div class="card-content px-2 py-2 <?= ($i < count($commentList) - 1 ? 'border-bottom' : '') ?> " >
            <?= htmlspecialchars($comment['content']) ?>
            <br />
        </div>
        
<?php $i++;
    }
} ?>
    </div>
</div>
<?php
    $content = ob_get_clean();

    require('template/template.php');
?>