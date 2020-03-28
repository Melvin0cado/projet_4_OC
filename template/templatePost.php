<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3 class="card-title">
            <?=  $post['title'] ?>
        </h3>
        <span class="card-subtitle mb-2 text-muted"><em><?= $post['author'] ?>, le <?= date('d/m/Y', strtotime($post['created_at'])) ?></em></span>
    </div>
    <div class="card-body">
        <div>
        <?= $post['content'] ?>
        </div>
    </div>
    <?php if (!(!isset($_SESSION['admin']) && htmlspecialchars($_GET['action']) === 'read_post') ) { ?>
        <div class="card-footer bg-footer-post py-1 px-1">
            <div class="d-flex justify-content-end ">
        
    <?php if (htmlspecialchars($_GET['action']) !== 'read_post') { ?>
            <a class="btn btn-primary mr-1" href="index.php?action=read_post&postId=<?= $post['id'] ?>">
                    Lire la suite
            </a>
    <?php } ?>
    <?php if (isset($_SESSION['admin'])) { ?>
            <a class="btn btn-primary mr-1" href="index.php?action=edit_post&postId=<?= $post['id'] ?>">
                Modifier
            </a>
            <a class="btn btn-danger" href="index.php?action=delete_post&postId=<?= $post['id'] ?>">
                Supprimer
            </a>
    <?php } ?>
        </div>
    </div>
    <?php } ?>
</div>
