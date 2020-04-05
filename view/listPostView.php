<?php ob_start(); ?>
<div>

<?php

    if(isset($_SESSION['admin'])){
?>
    <h1>Gérer les Post</h1>
<?php
    }
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
