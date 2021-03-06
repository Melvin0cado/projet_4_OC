<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="asset/css/style.css" />
        <script src="https://cdn.tiny.cloud/1/v5ref0wog0wily8aushukz9gf8b004avh4wh60mobpnj9bgr/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    </head>
        
    <body>
        <?php if(isset($_SESSION['admin'])){ ?>
            <div class="row">
                <div class="col-2 pr-0">
        <?php } ?>
        
        <?php require('template/header.php'); ?>
        <?php if(isset($_SESSION['admin'])){ ?>
                </div>
                <div class="col mb-2">
        <?php } ?>
                <div class="<?= (!isset($_SESSION['admin'])) ? 'maginForUser justify-content-between' : 'mt-2' ?> page container-fluid d-flex flex-column ">
                    
                    <?= $content ?>
                    <?php if(!isset($_SESSION['admin'])) {
                        require('footer.php');
                    }  ?>
                </div>
        <?php if(isset($_SESSION['admin'])){ ?>
                </div>
            </div>
        <?php } ?>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="asset/js/tinymce.js"></script>
    </body>
</html>
