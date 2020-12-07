<?php
/**
 * Created by PhpStorm.
 * User: Mike Wierenga
 * Date: 26/10/2020
 * Time: 19:04
 */

include 'template.php';
if ( $_SESSION['username'] == 'admin'){
    echo 'Welcome '. $_SESSION['username'];
}else{
    header("location: index.php");
}
