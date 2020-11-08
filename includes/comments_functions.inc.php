<?php

function setComments($conn) {
  if (isset($_POST['submit'])) {
    $uid = $_POST['uid'];
    $date = $_POST['date'];
    $message = str_replace("'", "''", $_POST['message']);

    $sql = "INSERT INTO comments (uid, date, message) VALUES ('$uid', '$date', '$message')";
    $result = mysqli_query($conn, $sql);
    header("Location: comments.php");
  }
}


function getComments($conn) {
  $sql = "SELECT * FROM comments";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result)) {

    echo '<div class="comment-box">
            <div class="comment-author">'
              .$row['uid'].'</br>
            </div>
            </br>
            <div class="comment-date">'
            .date('d.m.Y', strtotime($row['date'])).'</br>
            </div>
            <div class="comment-text">'
            .nl2br($row['message']).
            '</div>
             </br>';

        if (isset($_SESSION['u_uid'])) {
          if ($_SESSION['u_uid'] == $row['uid']) {
            echo '<form class="delete-form" action="'.deleteComments($conn).'" method="POST">
              <input type="hidden" name="cid" value="'.$row['cid'].'">
              <input type="submit" name="delete" value="Delete">
            </form>';
            echo '<form class="edit-button" action="editComments.php" method="POST">
              <input type="hidden" name="cid" value="'.$row['cid'].'">
              <input type="hidden" name="message" value="'.$row['message'].'">
              <input type="submit" name="submit" value="Edit">
            </form>';
      } else {
        echo '<form class="answer-form" action="answerComments.php" method="POST">
          <input type="hidden" name="cid" value="'.$row['cid'].'">
          <input type="hidden" name="message" value="'.$row['message'].'">
          <input type="submit" name="submit" value="Answer">
        </form>';
      }
    }
    echo '</div>';
    $cid = $row['cid'];
    $sql2 = "SELECT * FROM answers WHERE cid='$cid'";
    $result2 = mysqli_query($conn, $sql2);

    while ($row2 = mysqli_fetch_assoc($result2)) {

      echo '<div class="answer-box">
              <div class="answer-author">'
                .$row2['uid'].'
              </div>
              <div class="answer-date">'
              .date('d.m.Y', strtotime($row2['date'])).'</br>
              </div>
              <div class="comment-text">'
              .nl2br($row2['message']).
              '</div>';
      if (isset($_SESSION['u_uid'])) {
        if ($_SESSION['u_uid'] == $row2['uid']) {
          echo '<form class="delete-form" action="'.deleteAnswer($conn).'" method="POST">
            <input type="hidden" name="aid" value="'.$row2['aid'].'">
            <input type="submit" name="deleteAnswer" value="Delete">
          </form>';
            }
          }
      echo '</div>';
    }
  }
}


function deleteComments($conn) {
  if (isset($_POST['delete'])) {
    $cid = $_POST['cid'];
    $sql = "DELETE FROM comments WHERE cid='$cid'";
    $result = mysqli_query($conn, $sql);
    $sql = "DELETE FROM answers WHERE cid='$cid'";
    $result = mysqli_query($conn, $sql);
    header("Location: comments.php");
  }
}

function deleteAnswer($conn) {
  if (isset($_POST['deleteAnswer'])) {
    $aid = $_POST['aid'];
    $sql = "DELETE FROM answers WHERE aid='$aid'";
    $result = mysqli_query($conn, $sql);
    header("Location: comments.php");
  }
}

function editComments($conn) {
  if (isset($_POST['edit'])) {
    $cid = $_POST['cid'];
    $message = $_POST['message'];
    $sql = "UPDATE comments SET message='$message' WHERE cid='$cid'";
    $result = mysqli_query($conn, $sql);
    header("Location: comments.php");
  }
}

function answerComments($conn){
  if (isset($_POST['answer'])) {
    $uid = $_POST['auid'];
    $date = $_POST['date'];
    $newmessage = str_replace("'", "''", $_POST['newmessage']);
    $cid = $_POST['cid'];

    $sql = "INSERT INTO answers (uid, date, message, cid) VALUES ('$uid', '$date', '$newmessage', '$cid')";
    $result = mysqli_query($conn, $sql);
    header("Location: comments.php");
  }
}

function getAnswers($conn){
  $sql = "SELECT * FROM answers";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result)) {

    echo '<div class="comment-box">
            <div class="comment-author">'
              .$row['uid'].'</br>
            </div>
            </br>
            <div class="comment-date">'
            .date('d.m.Y', strtotime($row['date'])).'</br>
            </div>
            <div class="comment-text">'
            .nl2br($row['message']).
            '</div>
             </br>';
    echo '</div>';
  }
}



 ?>
