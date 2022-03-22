<?php
namespace BlogPHP\Controller;
use BlogPHP\Model\Authentication;
use BlogPHP\Model\Post;

/**
 * @package BlogPHP\Controller
 */
class AuthenticationController
{
    protected $manager;
    protected $modelPost;
    protected $modelAuthentication;
    private $id;

    public function __construct()
    {
        $this->manager = new \BlogPHP\app\BlogManager;
        $this->manager->getModel('Authentication');
        $this->modelPost = new Post();
        $this->modelAuthentication = new Authentication();
        if (empty($_GET['id'])) {
            $this->id = 0;
        } else {
            $this->id = (int) $_GET['id'];
        }
    }

    public function login()
    {
        if (!empty($_SESSION)) {
            header('Location: ' . ROOT_URL);
            exit();
        } elseif (isset($_POST['username'], $_POST['password'])) {
            if ($this->modelAuthentication->getAuthentication($_POST['username'], $_POST['password'])) {
                session_start();
                $_SESSION['active'] = $_POST['username'];
                header('Location: ' . ROOT_URL);
                exit();
            } else {
                $this->manager->msgError = 'Your login credentials are incorrect. Please try again later.';
            }
        }
        $this->manager->getView('login');
    }

    public function logout()
    {
        if (empty($_SESSION)) {
            header('Location: ' . ROOT_URL);
            exit();
        } elseif (!empty($_SESSION)) {
            $_SESSION = array();
            session_unset($_SESSION);
            session_destroy();
            setcookie(session_name(), '', 0, '/');
        }
        $this->manager->getView('logout');
    }

    
    public function notFound() {
        $this->manager->getView('404');
    }
}