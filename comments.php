<?php
include_once 'includes/dbh.inc.php';
include_once 'includes/comments_functions.inc.php';
include_once 'includes/header.php';
date_default_timezone_set('Europe/Vienna');
 ?>

     <div class="main-wrapper">
       <h1>Comment Section</h1>
        <div class="second-wrapper">


           <iframe width="980px" height="550px" src="https://www.youtube.com/embed/2saZYafPtRI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

<?php
      if (isset($_SESSION['u_uid'])) {
        echo '<form class="comment-area" action="'.setComments($conn).'" method="post">
               <input type="hidden" name="date" value="'.date('Y-m-d').'">
               <input type="hidden" name="uid" value="'.$_SESSION['u_uid'].'">
               <textarea name="message" rows="8" cols="80" placeholder="Your Message goes here!"></textarea>
               <input type="submit" name="submit" value="Comment">
             </form></br>';
      } else {
        echo '<p class="comment-error">You must be logged in to comment<p>';
      }

      getComments($conn);

?>





        </div>
    </div>
