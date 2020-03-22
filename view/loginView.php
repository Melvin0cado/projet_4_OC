<?php ob_start(); ?>
<h1>Connexion à l'administration</h1>
<br />

<form method="post" action="index.php?action=login">
    <input name="name" type="text" placeholder="Nom de compte" />
    <input name="password" type="password" placeholder="Mot de passe" />
    <input name="submit" type="submit" value="valider" />
</form>
<?php if (isset($error)) { ?>
<p class="text-danger"><?= $error ?></p>
<?php } ?>
<?php
    $content = ob_get_clean();

    require('template/template.php');
?>
