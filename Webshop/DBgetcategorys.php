<?php
/**
 * Created by PhpStorm.
 * User: Mike Wierenga
 * Date: 19/10/2020
 * Time: 16:02
 */
include 'server.php';

$categories = $db->query("SELECT * from category");
foreach ($categories->fetch_all() as $category){
    ?><?php
    if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') { ?>

        <form method="post" action="DBgetcategorys.php">
            <?php include 'errors.php' ?>
            <label>Category:</label>
            <input type="hidden" name="id" value="<?php echo $category[0]?>">
            <input name="name"  value="<?php echo $category[1] ?>">
            <button type="submit" class="btn" name="edit_cat">Edit</button> <button type="submit" class="btn" name="delete_cat">Delete</button>
        </form>

    <?php  } else {
        echo $category[1]; }

?>
    <?php
    $items = $db->query("SELECT * from item WHERE categoryid=$category[0]");
    foreach ($items->fetch_all() as $item){
        ?><div><?php
            if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') { ?>
            <form method="post" action="DBgetcategorys.php">
                <?php include 'errors.php' ?>
                <label>Item:</label>
                <input type="hidden" name="id" value="<?php echo $item[0]?>">
                <input name="name"  value="<?php echo $item[1] ?>"><input name="description"  value="<?php echo $item[2] ?>"><input name="price"  value="<?php echo $item[3] ?>">
                <button type="submit" class="btn" name="edit_item">Edit</button> <button type="submit" class="btn" name="delete_item">Delete</button>
            </form>

        <?php  } else {
                echo $item[1]. ' ' . $item[2]. ' ' . $item[3]; }
    }?> </div> <?php
       if (isset($_SESSION['username']) && $_SESSION['username']== 'admin') {?>
        <form method="post" action="DBgetcategorys.php">
            <input type="hidden" name="id" value="<?php echo $category[0] ?>">
            <label>Add a item: </label>
            <label>Name: </label><input name="name">
            <label>Description: </label><input name="description">
            <label>Price: </label><input name="price">
            <button type="submit" class="btn" name="add_item">Add</button>
    </form><br/><?php }


}
if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin'){?>
    <form method="post" action="DBgetcategorys.php">
        <input name="name"><button type="submit" class="btn" name="add_cat">Add category</button>
    </form>

<?php }


