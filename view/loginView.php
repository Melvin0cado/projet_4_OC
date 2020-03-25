<?php ob_start(); ?>
<div class="row">
<div class="col col-lg-4"></div>
<div class="col-md-auto">
<h1 class="text-center text-primary">Connexion à l'administration</h1>
<br />
<form method="post" action="index.php?action=login">
    <div class="form-group">
        <label for="name">Nom de compte</label>
        <input id="name" class="form-control" name="name" type="text" placeholder="Ex : Charlie"/>
    </div>
     <div class="form-group">
        <label for="password">Mot de passe</label>
        <input name="password" class="form-control" type="password" />
    </div>
    <?php if (isset($error)) { ?>
        <p class="text-danger"><?= $error ?></p>
    <?php } ?>
    <input class="btn btn-primary" name="submit" type="submit" value="valider" />
</form>

</div>
<div class="col col-lg-4"></div>
</div>

<?php
    $content = ob_get_clean();

    require('template/template.php');
?>
