<?php ob_start(); ?>
<div>
<h1 class="text-primary mb-4">Modifier le post</h1>
<br />
<?php require('template/templateTinymce.php'); ?>
</div>
<?php
    $content = ob_get_clean();

    require('template/template.php');
?>
