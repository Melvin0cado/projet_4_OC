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

    public function removeComment($commentId, $postId){
        $this->db->deleteById('comment', $commentId);
        $this->globalController->redirect("index.php?action=read_post&postId=$postId");
    }

    public function addReport($commentId, $postId)
    {
        if (isset($_POST['report'], $_POST['report_number']) && is_int(intval($_POST['report_number']))) {
            $dataTypeToUpdate = ['report_number'];
            $dataToInsert = [$_POST['report_number'] + 1];
            $this->db->updateById('comment', $commentId, $dataTypeToUpdate, $dataToInsert);
        }
        $this->globalController->redirect("index.php?action=read_post&postId=$postId");
    }
}
