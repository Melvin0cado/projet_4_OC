<?php ob_start(); ?>
<h1>ERROR 404 : Page not found</h1>
<?php
    $content = ob_get_clean();

    require('template/template.php');
?>
