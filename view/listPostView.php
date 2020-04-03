<?php ob_start(); ?>
<div>
<script src="asset/js/tinymce.js"></script>
<?php require('template/templateTinymce.php'); ?>
<?php
    if (count($posts) > 0) {
        foreach ($posts as $post) {
?>
<?php
            require("template/templatePost.php");
?>
<?php
        }
    }
?>
</div>
<?php
    $content = ob_get_clean();

    require('template/template.php');
?>
