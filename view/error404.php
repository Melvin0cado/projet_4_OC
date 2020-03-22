<?php ob_start(); ?>
<h1>ERREUR 404 : Page non trouvée</h1>
<?php
    $content = ob_get_clean();
    $title = 'ERREUR 404';
    require('template/template.php');
?>
