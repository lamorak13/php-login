<?php
include_once 'includes/dbh.inc.php';
include_once 'includes/comments_functions.inc.php';
include_once 'includes/header.php';
?>


<div class="main-wrapper">
  <h1>Submit your Answer!</h1>
   <div class="second-wrapper">

<?php
  echo '<form class="edit-form" action="'.answerComments($conn).'" method="POST">
         <input type="hidden" name="cid" value="'.$_POST['cid'].'">
         <input type="hidden" name="auid" value="'.$_SESSION['u_uid'].'">
         <input type="hidden" name="date" value="'.date('Y-m-d').'">
         <textarea name="newmessage" rows="8" cols="80"></textarea>
         <input type="submit" name="answer" value="Answer">
       </form>';




?>

</div>
</div>
