<footer class="row bg-dark d-flex justify-content-center align-items-center">
    <?php if (isset($_SESSION['admin'])) { ?>
    <div>
        <a class="btn btn-primary" href="index.php?action=disconnect">Déconnexion</a>
    </div>
    <?php } else { ?>
    <div>
        <a class=" btn btn-primary" href="index.php?action=login">Administration</a>
    </div>
    <?php } ?>
</footer>