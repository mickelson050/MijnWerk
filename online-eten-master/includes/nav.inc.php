
<?php 

    include 'dbh.inc.php';
    $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);

    $sql = "SELECT * FROM users WHERE user_id = '$user_id' AND rank = 'admin'";
    $admin = mysqli_query($conn, $sql);

    $sql = "SELECT * FROM business WHERE user_id = '$user_id'";
    $get_business = mysqli_query($conn, $sql);
    }

 ?>

<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="pull-left">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#">Online-eten.nl</a></li>
                <li><a class="" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            </ul>
        </div>
    </div>

    <div class="pull-right">
    <ul class="nav navbar-nav">

                <?php if(!isset($_SESSION['user_id'])) { ?>
                    <li><a href="registreren.php"><span class="glyphicon glyphicon-user"> Registreren</a></li>
                    <li><a href="inloggen.php"><span class="glyphicon glyphicon-log-in"> Inloggen</a></li>
                <?php } ?>

                <?php if(isset($_SESSION['user_id'])) { ?>
                     <li class="dropdown">
                <?php foreach($result as $value) { ?>
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $value['first_name']; ?> <span class="caret"></span></a>
                <?php } ?>
                      <ul class="dropdown-menu">
                        <li><a href="mijn-account.php"><i class="fa fa-cog" aria-hidden="true"></i> Mijn account</a></li>
                        <?php if (mysqli_fetch_assoc($admin) > 0) {  ?>
                       
                         <li><a href="adminindex.php"><i class="fa fa-cog" aria-hidden="true"></i> Admin dashboard </a></li>
                         <?php } ?>
                        <?php if (mysqli_fetch_assoc($get_business) > 0) {  ?>
                       
                         <li><a href="bedrijven-portal.php"><i class="fa fa-cog" aria-hidden="true"></i> Mijn bedrijven</a></li>
                         <?php } ?>
                        <li><a href="includes/logout.inc.php"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="glyphicon glyphicon-log-out"></i> Uitloggen</a></li>
                                    <form id="logout-form" action="includes/logout.inc.php" method="POST" style="display: none;"></form>
                      </ul>
                    </li>
                <?php } ?>
        </div>
    </div>

</nav>