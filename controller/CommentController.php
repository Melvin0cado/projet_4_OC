<?php

final class CommentController
{
    private $db;

    public function __construct($db, $globalController)
    {
        $this->db = $db;
        $this->globalController = $globalController;
    }

    public function createComment($postId)
    {
        if (isset($postId, $_POST['pseudo'], $_POST['comment'], $_POST['submit']) &&
            $_POST['pseudo'] !== '' &&
            $_POST['comment'] !== '') {
            $dataTypeToInsert = ['postID','content', 'author','created_at'];
            $dataToInsert = [
                $postId,
                $_POST['comment'],
                $_POST['pseudo'],
                date('Y-m-d G:i')
            ];

            $this->db->insert('comment', $dataTypeToInsert, $dataToInsert);
            $this->globalController->redirect("index.php?action=read_post&postId=$postId");
        }
    }

    public function removeComment($commentId, $postId)
    {
        $this->db->deleteById('comment', $commentId);
        $this->globalController->redirect("index.php?action=read_post&postId=$postId");
    }

    public function addReport($commentId, $postId, $reportNumber)
    {
        $dataTypeToUpdate = ['report_number'];
        $dataToInsert = [$reportNumber + 1];
        $this->db->updateById('comment', $commentId, $dataTypeToUpdate, $dataToInsert);
        $this->globalController->redirect("index.php?action=read_post&postId=$postId");
    }
}
