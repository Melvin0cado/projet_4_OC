<?php ob_start(); ?>
<div>

<?php if(isset($_SESSION['admin'])){ ?>

    <h1 class="text-primary mb-4">Gérer les articles</h1>

<?php 
    }
    if (count($posts) > 0) {
        foreach ($posts as $post) {
            require("template/templatePost.php");
        }
    }
?>

</div>

<?php
    $content = ob_get_clean();

    require('template/template.php');
?>
