<?php
session_start();

require('model/DataBase.php');
require('controller/PostController.php');
require('controller/CommentController.php');
require('controller/GlobalController.php');
require('controller/LoginController.php');
require('controller/DashboardController.php');

date_default_timezone_set('Europe/Paris');
$db = new DataBase;
$globalController = new GlobalController;
$commentController = new CommentController($db, $globalController);
$postController = new PostController($db, $commentController, $globalController);
$loginController = new LoginController($db, $globalController);
$dashboardController = new DashboardController($db, $globalController);

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'postList') {
        $postController->getPostList();
    } elseif ($_GET['action'] === 'create_post') {
        $postController->createPost();
    } elseif ($_GET['action'] === 'dashboard') {
        $dashboardController->load();
    } elseif ($_GET['action'] === 'createPost') {
        require('view/createPostView.php');
    } elseif ($_GET['action'] === 'create_comment' && $_GET['postId']) {
        $commentController->createComment($_GET['postId']);
    } elseif ($_GET['action'] === 'removeComment' && isset($_GET['postId'], $_GET['commentId']) && is_int(intval($_GET['postId'])) && is_int(intval($_GET['commentId']))) {
        $commentController->removeComment($_GET['commentId'], $_GET['postId']);
    } elseif ($_GET['action'] === 'delete_post' && isset($_GET['postId']) && is_int(intval($_GET['postId']))) {
        $postController->deletePost(intval($_GET['postId']));
    } elseif ($_GET['action'] === 'edit_post' && isset($_GET['postId']) && is_int(intval($_GET['postId']))) {
        $postController->editPost(intval($_GET['postId']));
    } elseif ($_GET['action'] === 'read_post' && isset($_GET['postId']) && is_int(intval($_GET['postId']))) {
        $postController->readPost(intval($_GET['postId']));
    } elseif ($_GET['action'] === 'report' &&
        isset($_GET['postId'], $_GET['commentId'], $_GET['report_number']) &&
        is_int(intval($_GET['postId'])) &&
        is_int(intval($_GET['commentId'])) &&
        is_int(intval($_GET['report_number']))) {
        $commentController->addReport(intval($_GET['commentId']), intval($_GET['postId']), intval($_GET['report_number']));
    } elseif ($_GET['action'] === 'login') {
        $loginController->administrationLogin();
    } elseif ($_GET['action'] === 'disconnect') {
        $loginController->administrationDisconnect();
    } else {
        require('view/error404.php');
    }
} else {
    header("Location: index.php?action=postList");
}
