<?php
include_once 'includes/dbh.inc.php';
include_once 'includes/comments_functions.inc.php';
include_once 'includes/header.php';
?>


<div class="main-wrapper">
  <h1>Edit this Comment</h1>
   <div class="second-wrapper">

<?php
  echo '<form class="edit-form" action="'.editComments($conn).'" method="POST">
         <input type="hidden" name="cid" value="'.$_POST['cid'].'">
         <textarea name="message" rows="8" cols="80">'.$_POST['message'].'</textarea>
         <input type="submit" name="edit" value="Edit">
       </form>';




?>

</div>
</div>
