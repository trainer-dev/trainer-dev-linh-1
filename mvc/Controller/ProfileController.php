<?php
/**
 * Created by PhpStorm.
 * User: linhngoc
 * Date: 18/02/2019
 * Time: 08:14
 */
class ProfileController {
    function __construct()
    {
    }

    function getProfile() {
        include __DIR__."/../View/AdminProfile/profile.php";
    }
}