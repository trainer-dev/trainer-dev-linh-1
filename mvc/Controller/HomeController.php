<?php
/**
 * Created by PhpStorm.
 * User: linhngoc
 * Date: 25/01/2019
 * Time: 15:10
 */
use Model\Login;

require __DIR__. "/../Model/login.php";
class HomeController {
    public function __construct()
    {
    }

    public function getHome() {
//        $check = new Login();
//        if (isset($_REQUEST['submit'])) {
//            extract($_REQUEST);
//            $username = $_POST['username'];
//            $password = $_POST['password'];
//            $login = $check->checkLogin($username, $password);
//            if ($login) {
                require __DIR__. "/../View/Auth/index.php";
////            } else {
////                header("location:/login");
////            }
//        }
    }
}
new HomeController();