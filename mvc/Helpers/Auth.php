<?php
namespace Helpers;

require __DIR__."/../Database.php";

class Auth {

    public $db;

    public function __construct()
    {
        $this->db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if (mysqli_connect_errno()) {
            echo "Error: Could not connect to database.";
            exit;
        }
    }

    /**Starting session*/
    public function get_session() {
        return $_SESSION["login"];
    }

    /**For logout process*/
    public function  get_logout() {
        $_SESSION["login"] = false;
        session_destroy();
    }
}
?>