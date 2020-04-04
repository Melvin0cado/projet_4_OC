<?php ob_start(); ?>
<div>

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
