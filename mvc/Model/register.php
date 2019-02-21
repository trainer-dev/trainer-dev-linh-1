<?php
/**
 * Created by PhpStorm.
 * User: linhngoc
 * Date: 18/01/2019
 * Time: 16:26
 */

namespace Model;
use Helpers\Auth;

require __DIR__ . "/../Helpers/Auth.php";
class Register extends Auth
{
    /**for registration process*/
    public function __construct()
    {
        parent::__construct();
    }

    public function regUser($username, $password2, $email)
    {
        $password2 = md5($password2);

        $sql = 'SELECT * FROM users WHERE username = "' . $username . '"';

        //Checking if username or email is available in database
        $check = $this->db->query($sql);
        $count_row = $check->num_rows;

        //if the username is not in database then insert the table
        if ($count_row == 0) {
            $sqlInsertDB = 'INSERT INTO users SET username="' . strtolower($username) . '", password = "'
                . strtolower($password2) . '",email= "' . $email . '"';
            $result = mysqli_query($this->db, $sqlInsertDB) or die(mysqli_connect_errno() . "Data cannot insert");
            return $result;
        } else {
            return false;
        }
    }
}