<?php 
ob_start();


if(isset($_SESSION['admin'])) {
    ?>
    <h1 class="text-primary mb-4">Créer un article</h1>
    <?php
    require('template/templateTinymce.php');
    
}

$content = ob_get_clean();
$title = 'Créer un post';

require('template/template.php');

?>