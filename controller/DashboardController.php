<?php

final class DashboardController
{
    private $db;

    public function __construct($db, $globalController)
    {
        $this->db = $db;
        $this->globalController = $globalController;
    }

    public function load() {

        $postNumber = $this->db->query('SELECT COUNT(*) as nbPost FROM `post` WHERE 1 ')['nbPost'];
        $commentNumber = $this->db->query('SELECT COUNT(*) as nbComment FROM `comment` WHERE 1 ')['nbComment'];
        $lastPost = $this->db->query('SELECT * FROM `post` ORDER BY created_at DESC LIMIT 5', 'Post', true);
        $mostReportedComment = $this->db->query('SELECT * FROM `comment` WHERE report_number > 0 ORDER BY report_number DESC LIMIT 5', 'Comment', true);
        $lastComment = $this->db->query('SELECT * FROM `comment` ORDER BY created_at DESC LIMIT 5', 'Comment', true);

        require('view/dashboardView.php');
    }
}