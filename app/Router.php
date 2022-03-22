<?php

namespace BlogPHP\App;


/**
 * @package BlogPHP\App
 */

class Router {
    /**
     * @param array $params 
     */

    public static function run (array $params) {
		
        $namespace = 'BlogPHP\controller\\';
        $controllerDef = $namespace . 'BlogController';
        $controllerPath = ROOT_PATH . 'controller/';
        $controller = ucfirst($params['ctrl']);
		
        if (is_file($controllerPath . $controller . '.php')) {
            $controller = $namespace . $controller;
            $controllerNew = new $controller;
            if ((new \ReflectionClass($controllerNew))->hasMethod($params['act']) && (new \ReflectionMethod($controllerNew, $params['act']))->isPublic()) {
                call_user_func(array($controllerNew, $params['act']));
			} else {
                call_user_func(array($controllerNew, 'notFound'));
			}
        }
        else {
            call_user_func(array(new $controllerDef, 'notFound'));
        }
    }
}