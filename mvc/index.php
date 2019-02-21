<?php

use Controller\LoginController;

require "vendor/autoload.php";

$uri = $_SERVER['REQUEST_URI'];


/**
 * // App/Cores/Router
 * class Router {
 *   private NAMESPACE = _DIR.'/Controllers';
 *
 *  public function get($uri, $controllerAction);
 *          ...
 * return $this;
 *  }
 *
 *
 * s
 *
 *
 */


/**
 * Home page
 */
if($uri == "/") {
    require __DIR__ . '/Controller/HomeController.php';
    if ($_SERVER['REQUEST_METHOD'] =='GET') {
        $auth = new HomeController();
        $auth->getHome();
    }
}

// request_uri($uri, ['POST','GET'],'HomeController@getHome');
// dùng explode() => tách ra array =>

/**
 * Login page
 */
else if ($uri == '/login'){
    require __DIR__ . '/Controller/LoginController.php';
    if ($_SERVER['REQUEST_METHOD'] =='POST') {
        $auth = new loginController();
        $auth->postLogin();
    }
    else if ($_SERVER['REQUEST_METHOD']=='GET') {
        $auth = new loginController();
        $auth->getLogin();
    }
}

/**
 * Register page
 */
else if ($uri=="/register") {
    require __DIR__ . '/Controller/RegisterController.php';
    if ($_SERVER['REQUEST_METHOD'] =='GET') {
        $auth = new RegisterController();
        $auth->getRegister();
    }
    else if ($_SERVER['REQUEST_METHOD'] =='POST') {
        $auth = new RegisterController();
        $auth->postRegister();
    }
}

/**
 * Profile page
 */

else if ($uri=="/profile") {
    require __DIR__. '/Controller/ProfileController.php';
    if ($_SERVER['REQUEST_METHOD']=='GET') {
        $profile = new ProfileController();
        $profile->getProfile();
    }
}

