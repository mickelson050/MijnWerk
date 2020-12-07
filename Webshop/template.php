<?php
/**
 * Created by PhpStorm.
 * User: Mike Wierenga
 * Date: 14/10/2020
 * Time: 15:37
 */

include 'server.php';
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pizzaria der unitassg</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<div class="navigation">
    <div class="information">
        <a href="index.php">Home</a>
    </div>
    <div class="adminpage" style="float: left; margin-left: 5px;">
        <?php
            if (isset($_SESSION['username'])){
            if ($_SESSION['username'] == 'admin') { ?>
                <a href="adminpage.php"> admin pagina</a>
            <?php  } else { ?> <?php
        }}?>
    </div>
    <div class="login/register">

        <?php  if (isset($_SESSION['username'])){ ?>
            Welcome <strong><?php echo $_SESSION['username']; ?></strong>
            <a href="index.php?logout='1'" style="color: red;">logout</a>
        <?php }else{?>
            <a href="login.php" class="login">Login</a>
            <a href="register.php" class="register">register</a>
        <?php } ?>

    </div>

</div>

</body>
</html>
