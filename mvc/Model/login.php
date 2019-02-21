<?php
/**
 * Created by PhpStorm.
 * User: linhngoc
 * Date: 18/01/2019
 * Time: 14:49
 */

namespace Model;


use Helpers\Auth;

require __DIR__ . "/../Helpers/Auth.php";
require __DIR__ . "/../Helpers/Session.php";
class Login extends Auth
{
    public $username;
    public $password;

    public function __construct()
    {
        parent::__construct();
    }

    /**Check login */
    public function checkLogin($username, $password)
    {

        $password = md5($password);
        $sql2 = 'SELECT * FROM users WHERE username="'.strtolower($username) .'"AND password="'.strtolower($password).'"';
        // select_from_db('users', ['username' => $username, 'password' => $password], $columns=['*'])

        //Checking if username is available in the table
        $result = mysqli_query($this->db, $sql2);
        $userData = mysqli_fetch_array($result);
        $countRow = $result->num_rows;

        if ($countRow === 1) {
            //this login var will use for the session thing
            $_SESSION["login"] = true;
            $_SESSION["id"] = $userData["id"];
            return true;
        } else {
            return false;
        }
    }
}
