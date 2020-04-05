<?php 
ob_start();


if(isset($_SESSION['admin'])) {
    ?>
    <h1>Créer un Post</h1>
    <?php
    require('template/templateTinymce.php');
    
}

$content = ob_get_clean();
$title = 'Créer un post';

require('template/template.php');

?>