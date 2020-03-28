<?php ob_start(); ?>
<div class="d-flex justify-content-center flex-column align-items-center flex-grow-1">
    <img src="asset/image/error.png" alt="image error 404" />
    <h1>ERREUR 404 : Page non trouvée</h1>
    <a class="btn btn-primary" href="index?action=postList">Retour au blog</a>
</div>
<?php
    $content = ob_get_clean();
    $title = 'ERREUR 404';
    require('template/template.php');
?>
