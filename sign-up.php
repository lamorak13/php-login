<?php
include_once 'includes/header.php';
 ?>


    <div class="main-wrapper">
      <h1>Register Now!</h1>

      <form class="registration-form" action="includes/signup.inc.php" method="POST">
        <input type="text" name="first" placeholder="First Name">
        <input type="text" name="last" placeholder="Last Name">
        <input type="text" name="email" placeholder="EMail">
        <input type="text" name="uid" placeholder="User Name">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="conf" placeholder="Confirm Password">
        <input type="submit" name="submit" value="Register">
      </form>


    </div>
  </body>
</html>
