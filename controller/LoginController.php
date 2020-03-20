<?php


final class LoginController
{
    private $db;
    private $globalController;

    public function __construct($db, $globalController)
    {
        $this->db = $db;
        $this->globalController = $globalController;
    }

    public function administrationLogin()
    {
        if (isset($_POST['name'], $_POST['password'], $_POST['submit'])) {
            $this->administrationConnect();
        }

        $title = 'login page';
        require('view/loginView.php');
    }

    private function administrationConnect()
    {
        if ($_POST['name'] === 'admin') {
            $options = [
                'cost' => 12,
            ];
            $password = $_POST['password'];
            $hash = $this->db->selectByElement('user', 'name', 'admin')['password'];
            if(password_verify($password, $hash)){
                $_SESSION['admin'] = true;
            }
            $this->globalController->redirect('index.php?action=postList');
        }
    }

    public function administrationDisconnect() {
        unset($_SESSION['admin']);
        $this->globalController->redirect('index.php?action=postList');
    }
}
