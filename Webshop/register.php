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
<div class="register">
    <form method="post" action="register.php">
        <?php include 'errors.php' ?>
        <label for="name">Name:</label>
        <input type="text" name="username" value="<?php echo $username?>"><br>
        <label for="email">Email:</label>
        <input type="email"name="email" value="<?php echo $email?>"><br>
        <label for="password">Password:</label>
        <input type="password"  name="password1"><br>
        <label for="password">confirm Password:</label>
        <input type="password"  name="password2"><br><br>
        <button type="submit" name="reg_user">register</button>
    </form>
</div>
</body>
</html>
