<?php

if (isset($_POST['submit'])) {

  include_once 'dbh.inc.php';

$first = mysqli_real_escape_string($conn, $_POST['first']);
$last = mysqli_real_escape_string($conn, $_POST['last']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$uid = mysqli_real_escape_string($conn, $_POST['uid']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
$conf = mysqli_real_escape_string($conn, $_POST['conf']);

//error dba_handlers
//check for empty fields

  if (empty($first)  || empty($last) || empty($email) || empty($uid) || empty($pwd) || empty($conf)) {
      header('Location: ../sign-up.php?signup=empty');
      exit();
    } else {
      //Check for invalid email
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ../sign-up.php?signup=email');
        exit();

        } else {
        $sql = "SELECT * FROM users WHERE user_uid='$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
          header('Location: ../sign-up.php?signup=usertaken');
          exit();

            } else {

            // Check for invalid  password confirmation
            if ($pwd != $conf) {
              header('Location: ../sign-up.php?signup=confirm');
              exit();

                } else {
              // hashing the password
                $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
              //insert into database
                $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
                $result = mysqli_query($conn, $sql);
                header('Location: ../sign-up.php?signup=success');
                exit();
        }
      }
    }
  }
} else {
  header('Location: ../sign-up.php');
  exit();
}
 ?>
