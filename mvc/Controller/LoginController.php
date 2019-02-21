<?php
/**
 * Created by PhpStorm.
 * User: linhngoc
 * Date: 18/01/2019
 * Time: 16:09
 */
namespace Controller;

use Model\Login;

require __DIR__."/../Model/login.php";

class LoginController {

    function __construct() {

    }


    public function getLogin() {

        include __DIR__."/../View/Auth/login.php";
    }

    public function postLogin() {
        $check = new Login();
        if (isset($_REQUEST['submit'])) {
            extract($_REQUEST);
            $username = $_POST['username'];
            $password = $_POST['password'];
            $login = $check ->checkLogin($username, $password);
            if ($login) {
                //registration success
                header("location:/");
            }
            else {
                $error =  "Your username of password wrong.";
                include __DIR__."/../View/Auth/login.php";
            }
        }

    }
}

new loginController();
