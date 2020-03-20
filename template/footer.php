<footer>
    <?php if (isset($_SESSION['admin'])) { ?>
        <a href="index.php?action=disconnect">Déconnexion</a>
    <?php } else { ?>
        <a href="index.php?action=login">Administration</a>
    <?php } ?>
</footer>