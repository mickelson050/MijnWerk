<?php
/**
 * Created by PhpStorm.
 * User: Mike Wierenga
 * Date: 14/10/2020
 * Time: 15:07
 */
include 'template.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="login">
    <form method="post" action="login.php">
        <?php include('errors.php'); ?>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <button type="submit" class="btn" name="log_user">Login</button>
    </form>
</div>
</body>
</html>
