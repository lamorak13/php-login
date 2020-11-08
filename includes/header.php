<?php
session_start();
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="css/style.css">
     <title></title>
   </head>
   <body>
     <header>
       <div class="header-container">


           <h1 class="logo">Generic<span>Logo</span> </h1>
           <nav>
           <ul>
             <li><a href="index.php">home</a></li>
             <li><a href="comments.php">Comment</a></li>
             <?php
                     if (isset($_SESSION['u_id'])) {
                     echo '<li><a href="includes/logout.inc.php">Log Out</a></li>';
                     } else {
                     echo '<li><a href="sign-up.php">Sign Up</a></li>
                             <div class="nav-login">
                               <form class="login" action="includes/login.inc.php" method="POST">
                                 <input type="text" name="uid" placeholder="Username/EMail">
                                 <input type="password" name="pwd" placeholder="Password">
                                 <input type="submit" name="submit" value="Submit">
                               </form>
                             </div>';
                     }
                    ?>
           </ul>
           </nav>

         </div>
       </div>
     </header>
