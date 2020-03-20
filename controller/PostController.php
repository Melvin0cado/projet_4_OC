<?php

final class PostController
{
    private $db;
    private $commentController;
    private $globalController;

    public function __construct($db, $commentController, $globalController)
    {
        $this->db = $db;
        $this->commentController = $commentController;
        $this->globalController = $globalController;
    }

    public function getPostList()
    {
        $title = 'postList page';
        $posts = $this->db->selectAll('post', 'id', 'DESC', 'Post');
        require('view/listPostView.php');
    }

    public function createPost()
    {
        if (isset($_POST['title'], $_POST['author'], $_POST['submit'], $_POST['post'], $_POST['date'])) {
            $dataTypeToInsert = ['title', 'author','created_at', 'content'];
            $dataToInsert = [htmlspecialchars($_POST['title']), htmlspecialchars($_POST['author']), date('Y-m-d G:i'),  $_POST['post']];
            $this->db->insert('post', $dataTypeToInsert, $dataToInsert);
            $this->globalController->redirect('index.php?action=postList');
        }
    }

    public function deletePost($postId)
    {
        if (isset($_POST['delete']) && is_int($postId)) {
            $this->db->deleteById('post', $postId);
            $this->globalController->redirect('index.php?action=postList');
        }
    }

    public function editPost($postId)
    {
        if (isset($_POST['title'], $_POST['post'], $_POST['author'], $_POST['date'], $_POST['edit'], $postId) && is_Int(intval($postId))) {
            $dataTypeToUpdate = ['title','content','author','created_at'];
            $dataToUpdate = [$_POST['title'], $_POST['post'], $_POST['author'], $_POST['date']];
            $this->db->updateById('post', $postId, $dataTypeToUpdate, $dataToUpdate);
            $this->globalController->redirect('index.php?action=postList');
        } else {
            $title = 'post edit page';
            $post = $this->db->selectByElement('post', 'id', "$postId", 'id', 'DESC', 'Post');
            require('view/editPostView.php');
        }
    }
    
    public function readPost($postId)
    {
        $title = 'read post page';
        $post = $this->db->selectByElement('post', 'id', "$postId", 'id', 'DESC', 'Post');
        if (isset($_SESSION['admin'])) {
            $commentList = $this->db->selectAll('comment', 'report_number', 'DESC', 'Comment');
        } else {
            $commentList = $this->db->selectAll('comment', 'created_at', 'DESC', 'Comment');
        }
        require('view/readPostView.php');
    }
}
