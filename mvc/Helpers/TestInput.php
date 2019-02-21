<?php
/**
 * Created by PhpStorm.
 * User: linhngoc
 * Date: 26/01/2019
 * Time: 10:12
 */
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}