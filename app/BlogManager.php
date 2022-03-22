<?php

namespace BlogPHP\App;

/**
 * @package BlogPHP\App
 */
class BlogManager
{
    /**
     * @param string $view
     */
    public function getView($view)
    {
		$path = ROOT_PATH . 'view/' . $view . '.php';
        if (is_file($path)) {
            require $path;
		} else {
            exit('The "' . $path . '" file doesn\'t exist'); 
		}
    }

    /**
     * @param string $model 
     */
    public function getModel($model)
    {
		$path = ROOT_PATH . 'model/' . $model . '.php';
        if (is_file($path)){
            require $path;
		} else {
            exit('The "' . $path . '" file doesn\'t exist');
		}
    }
	
}