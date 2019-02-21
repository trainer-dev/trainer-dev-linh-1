<?php
/**
 * Created by PhpStorm.
 * User: linhngoc
 * Date: 25/01/2019
 * Time: 15:16
 */

use Model\Register;

require __DIR__."/../Model/register.php";
class RegisterController {
    public function __construct()
    {

    }

    /**
     * View Register
     */
    public function getRegister() {
        include __DIR__."/../View/Auth/register.php";
    }

    /**
     *
     */
    public function postRegister() {
        $reg = new Register();
        //Checking for user login or not
        if (isset($_REQUEST['submit'])) {
            extract($_REQUEST);

            $username = $_POST['username'];
            $password2 = $_POST['re-password'];
            $email = $_POST['email'];
            $register =  $reg->regUser($username, $password2, $email);


            if ($register) {
                $success= 'Registration successful';
                include __DIR__."/../View/Auth/register.php";
            }
            else {
                // Registration Failed
                $fail = 'Registration failed. Username already exits, please try again.';
                include __DIR__."/../View/Auth/register.php";
            }
        }
    }
}

new RegisterController();