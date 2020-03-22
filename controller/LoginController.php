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
        $error = '';
        if (isset($_GET['error'])) {
            $error = htmlspecialchars($_GET['error']);

            if ($error === 'name') {
                $error = 'Nom de compte inexistant';
            } elseif ($error === 'password') {
                $error = 'Mot de passe incorrect';
            }
        }
        
        require('view/loginView.php');
    }

    private function administrationConnect()
    {
        $name = $this->db->selectByElement('user', 'name', $_POST['name']);
        $error;
        
        if (in_array($_POST['name'], $name)) {
            $password = $_POST['password'];
            $hash = $this->db->selectByElement('user', 'name', $_POST['name'])['password'];
            if (password_verify($password, $hash)) {
                $_SESSION['admin'] = true;
            } else {
                $error = 'password';
            }
            $this->globalController->redirect('index.php?action=postList');
        } else {
            $error = 'name';
        }
        if (isset($error)) {
            $this->globalController->redirect("index.php?action=login&error=$error");
        }
    }

    public function administrationDisconnect()
    {
        unset($_SESSION['admin']);
        $this->globalController->redirect('index.php?action=postList');
    }
}
