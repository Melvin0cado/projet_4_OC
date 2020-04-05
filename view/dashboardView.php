<?php
ob_start();
?>
<h1 class="text-primary mb-4">Tableau de bord</h1>
<div class="row d-flex justify-content-around mb-3">
    <div class="col-5">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <strong>Nombre total d'articles</strong>
            </div>
            <div class="card-content px-3 py-2 d-flex justify-content-center">
                <?= $postNumber ?>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <strong>Nombre total de commentaires</strong>
            </div>
            <div class="card-content px-3 py-2 d-flex justify-content-center">
                <?= $commentNumber ?>
            </div>
        </div>
    </div>
</div>

<?php if (count($lastComment) > 0) { ?>

<div class="row d-flex justify-content-center mb-3">
    <div class="col-11">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <strong>Commentaires les plus signalés</strong>
            </div>
            <div class="card-content flex-column px-3 py-2 d-flex justify-content-center">
                <div class="row">
                    <div class="col-1">
                        <strong>ID</strong>
                    </div>
                    <div class="col-2">
                        <strong>Auteur</strong>
                    </div>
                     <div class="col-2">
                        <strong>Signalement</strong>
                    </div>
                    <div class="col-5">
                        <strong>Commentaire</strong>
                    </div>
                </div>
                <?php foreach ($mostReportedComment as $comment) { ?>
                    <div class="row">
                        <div class="col-1">
                            <?= $comment['id'] ?>
                        </div>
                        <div class="col-2">
                            <?= $comment['author'] ?>
                        </div>
                        <div class="col-2">
                            <?= $comment['report_number'] ?>
                        </div>
                        <div class="col-5">
                            <?= $comment['content'] ?>
                        </div>
                        <div class="col-2">
                            <a href="index.php?action=read_post&postId=<?= $comment['postID'] ?>#comment">Gérer ce commentaire</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="row d-flex justify-content-center mb-3">
    <div class="col-11">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <strong>Les 5 derniers commentaires</strong>
            </div>
            <div class="card-content flex-column px-3 py-2 d-flex justify-content-center">
                <div class="row">
                    <div class="col-1">
                        <strong>ID</strong>
                    </div>
                    <div class="col-2">
                        <strong>Auteur</strong>
                    </div>
                    <div class="col-2">
                            <strong>Date de création</strong>
                    </div>
                    <div class="col-5">
                        <strong>Commentaire</strong>
                    </div>
                </div>
                <?php foreach ($lastComment as $comment) { ?>
                    <div class="row">
                        <div class="col-1">
                            <?= $comment['id'] ?>
                        </div>
                        <div class="col-2">
                            <?= $comment['author'] ?>
                        </div>
                        <div class="col-2">
                            <?= date('d/m/Y à G:i', strtotime($comment['created_at'])) ?>
                        </div>
                        <div class="col-5">
                            <?= $comment['content'] ?>
                        </div>
                        <div class="col-2">
                            <a href="index.php?action=read_post&postId=<?= $comment['postID'] ?>#comment">Gérer ce commentaire</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php if (count($lastPost) > 0) { ?>
<div class="row d-flex justify-content-center mb-3">
    <div class="col-11">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <strong>Les 5 derniers articles</strong>
            </div>
            <div class="card-content flex-column px-3 py-2 d-flex justify-content-center">
                <div class="row">
                    <div class="col-1">
                        <strong>ID</strong>
                    </div>
                    <div class="col-2">
                        <strong>Auteur</strong>
                    </div>
                    <div class="col-2">
                            <strong>Date de création</strong>
                    </div>
                    <div class="col-5">
                        <strong>Contenu</strong>
                    </div>
                </div>
                <?php foreach ($lastPost as $post) { ?>
                    <div class="row">
                        <div class="col-1">
                            <?= $post['id'] ?>
                        </div>
                        <div class="col-2">
                            <?= $post['author'] ?>
                        </div>
                        <div class="col-2">
                            <?= date('d/m/Y à G:i', strtotime($post['created_at'])) ?>
                        </div>
                        <div class="col-5">
                            <?= $post['content'] ?>
                        </div>
                        <div class="col-2">
                            <a href="index.php?action=read_post&postId=<?= $post['id'] ?>">Gérer cet article</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php
}
$content = ob_get_clean();
$title = 'Tableau de bord';

require('template/template.php');

?>