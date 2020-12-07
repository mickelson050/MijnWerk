<?php
/**
 * Created by PhpStorm.
 * User: Mike Wierenga
 * Date: 18/10/2020
 * Time: 15:33
 */
if(!isset($_SESSION)) {
    session_start();
}
$username = "";
$email = "";
$errors = array();

//connect to the database
$db = mysqli_connect('localhost', 'root', '', 'pizzaria');


//register
if (isset($_POST['reg_user'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password1 = mysqli_real_escape_string($db, $_POST['password1']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);


    //form validatie om te checken of alles is ingevuld
    if (empty($username)){array_push($errors, "Username is required");}
    if (empty($email)){array_push($errors, "Email is required");}
    if (empty($password1)){array_push($errors, "Password is required");}
    if ($password1 != $password2){array_push($errors, "The two passwords do not match");}


    //check to make sure email is allready in use
    $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user){//if the email allready exists in the database
        if ($user['email'] === $email){
            array_push($errors, "Email allready exists");
        }
    }

    //if there are no errors register the user
    if (count($errors)==0){
        $password = md5($password1);

        $query = "INSERT INTO users(name, email, password)VALUES('$username', '$email', '$password') ";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        header('location: index.php');
    }

}

//login

if (isset($_POST['log_user'])){
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)){
        array_push($errors, 'Email is required');
    }
    if (empty($password)){
        array_push($errors, 'Password is required');
    }

    if (count($errors) ==0){
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$email' and password='$password'";
        $result = mysqli_query($db, $query);
        $row = $result->fetch_assoc();
        if (mysqli_num_rows($result) ==1){

            $_SESSION['username'] = $row['name'];
            header('location: index.php');
        }else{
            array_push($errors, "Wrong username/password");
        }
    }
}

//edit item
if (isset($_POST['edit_item'])){
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    if (empty($name)){
        array_push($errors, 'name of the item is required');
    }
    if (empty($price)){
        array_push($errors, 'price of the item is required');
    }

    if (count($errors)==0){
        $query = "UPDATE item SET item_name='$name', item_description='$description', item_price=$price WHERE id=$id";
        mysqli_query($db,$query);
        header("location: index.php");
    }
}

//add item
if (isset($_POST['add_item'])){
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    if (empty($name)){
        array_push($errors, 'name of the item is required');
    }
    if (empty($price)){
        array_push($errors, 'price of the item is required');
    }
    if (count($errors)==0){
        $query = "INSERT INTO item(item_name, item_description, item_price, categoryid) values('$name', '$description', $price, $id) ";
        if($db->query($query)===TRUE){
            echo 'row inserted';
            header("location: index.php");
        }else{
            echo 'row not inserted';
        }
    }
}

//delete item
if (isset($_POST['delete_item'])){
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $price = mysqli_real_escape_string($db, $_POST['price']);


    $query = "DELETE FROM item  WHERE id=$id";
    mysqli_query($db,$query);
    header("location: index.php");
}



//edit category
if (isset($_POST['edit_cat'])){
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $name = mysqli_real_escape_string($db, $_POST['name']);

    if (empty($name)){
        array_push($errors, 'name of the item is required');
    }


    if (count($errors)==0){
        $query = "UPDATE category SET category_name='$name' WHERE id=$id";
        mysqli_query($db,$query);
        header("location: index.php");
    }
}

//add category
if (isset($_POST['add_cat'])){
    $name = mysqli_real_escape_string($db, $_POST['name']);
    if (empty($name)){
        array_push($errors, 'name of the category is required');
    }
    if (count($errors)==0){
        $query = "INSERT INTO category (category_name)VALUE('$name')";
        if($db->query($query)===TRUE){
            echo 'row inserted';
            header("location: index.php");
        }else{
            echo 'row not inserted';
        }
    }
}

//delete category
if (isset($_POST['delete_cat'])){
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $query = "DELETE FROM category  WHERE id=$id";
    mysqli_query($db,$query);
    header("location: index.php");
}



