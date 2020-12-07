<?php
/**
 * Created by PhpStorm.
 * User: Mike Wierenga
 * Date: 18/10/2020
 * Time: 15:44
 */
if (count($errors) > 0) { ?>
  <div class="error">
  	<?php foreach ($errors as $error) { ?>
  	  <p><?php echo $error ?></p>
  	<?php } ?>
  </div>
<?php  } ?>
