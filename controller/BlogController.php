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
        $this->manager->getView('showPost');
    }

 
    public function add() {
        if (!empty($_POST['add_submit'])) { 
            if (isset($_POST['title'], $_POST['content'], $_POST['author'])  && !empty($_POST['title']) &&
             !empty($_POST['small_desc']) && !empty($_POST['content']) && !empty($_POST['author'])) {
                if(!ctype_space($_POST['title'])  && !ctype_space($_POST['content']) && !ctype_space($_POST['author'])) {
					if(mb_strlen($_POST['title']) >= 3 && mb_strlen($_POST['content']) >= 3 && mb_strlen($_POST['author']) >= 3) { 
                        $image_name=self::UploadImage($_FILES['image']);
	
                        $data = array(
                             'title' => htmlspecialchars($_POST['title']), 
                             'content' => htmlspecialchars($_POST['content']),
                              'author' => htmlspecialchars($_POST['author']),
                              'image'=>$image_name
                            );
                                
							if ($this->modelPost->add($data)) {
								$this->manager->msgSuccess = 'The post was added with success.';
							} else {
								$this->manager->msgError = 'An error has occured. Please contact the site admin.';
							}
					} else {
						$this->manager->msgError = 'Minimum 3 letters required for each field.';
					}
				} else {
					$this->manager->msgError = 'Please don\'t fill any of the fields with blank spaces.';
				}
            } else {
                $this->manager->msgError = 'Kindly fill all of the required fields before you submit, and make sure the title is less than 50 characters!';
            }
        }
        $this->manager->getView('addPost');
    }

    public function UploadImage($imageUpload) : string
    {
        $target_dir = "upload/";
        $file = $imageUpload['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $temp_name = $imageUpload['tmp_name'];
        $path_filename_ext = $target_dir.$filename.".".$ext;
        move_uploaded_file($temp_name,$path_filename_ext);
        return $temp_name . $path_filename_ext;
    }


  


}
