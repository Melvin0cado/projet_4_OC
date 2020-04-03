<?php if(!isset($_SESSION['admin'])) { ?>

<header class="d-flex justify-content-between border-bottom align-items-center fixed-top bg-light">
    <div><a href="index.php?action=postList" ><img class="rounded-right" src="asset/image/logo.png" alt="logo du bog de Jean Forteroche" /></a></div>
    <div><strong>Blog de Jean Forteroche</strong></div>
</header>

<?php } else { ?>

<header class="d-flex flex-column border-right bg-light h-100">
    <div><a href="index.php?action=dashBoard" ><img class="w-100 h-auto" src="asset/image/logo2.png" alt="logo du bog de Jean Forteroche" /></a></div>
    <ul class="nav flex-column">
    <li class="nav-item w-100 d-flex justify-content-center">
            <a class="nav-link w-100 text-center" href="index.php?action=dashBoard">Tableau de bord</a>
        </li>
        <li class="nav-item w-100 d-flex justify-content-center">
            <a class="nav-link w-100 text-center" href="index.php?action=createPost">Créer un post</a>
        </li>
    </ul>
</header>

<?php } ?>