<?php
include_once 'includes/header.php';
 ?>

<?php
if (isset($_SESSION['u_id'])) {
  echo '<div class="main-wrapper">
          <h1>Happy Customer</h1>
          <p>Hello '.$_SESSION["u_first"].', how are you?</p>
        </div>';
} else {
  echo '<div class="main-wrapper">
          <h1>Main Content</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>';
}

 ?>

  </body>
</html>
