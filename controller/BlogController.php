<?php
namespace BlogPHP\Controller;
use BlogPHP\Model\Authentication;
use BlogPHP\Model\Post;

/**
 * @package BlogPHP\Controller
 */
class BlogController {
	
	protected $manager, $modelPost, $modelAuthentication;
    private $id;

    public function __construct() {
        $this->manager = new \BlogPHP\app\BlogManager;
        $this->manager->getModel('Post');
        $this->manager->getModel('Authentication');
        $this->modelPost = new Post();
        $this->modelAuthentication = new Authentication();
		if(empty($_GET['id'])){
			$this->id = 0;
		} else {
			$this->id = (int) $_GET['id']; 
		}
    }


	public function home() {
		$this->manager->post = $this->modelPost->getAll();
        $this->manager->getView('home');
    }


    public function blogPosts() {
        $this->manager->posts = $this->modelPost->getAll(); // Get all the posts
        $this->manager->getView('blogPosts');
    }

 
    public function post() {
        $this->manager->post = $this->modelPost->getById($this->id); // Get the specific post using it's ID
        $this->manager->getView('post');
    }


    public function notFound() {
        $this->manager->getView('404');
    }

 
    public function login() {
        if (!empty($_SESSION)) {
            header('Location: ' . ROOT_URL);
            exit();
        } else if (isset($_POST['username'], $_POST['password'])) {
            if($this->modelAuthentication->getAuthentication($_POST['username'], $_POST['password'])) {
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

    public function logout() {
        if (empty($_SESSION)) {
            header('Location: ' . ROOT_URL);
            exit();
        } else if (!empty($_SESSION)) {
            $_SESSION = array();
            session_unset($_SESSION);
            session_destroy();
            setcookie(session_name(),'',0,'/');
        }
        $this->manager->getView('logout');
    }


}
