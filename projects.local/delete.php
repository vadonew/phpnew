<?php
include 'connection.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM `userinfo` WHERE id = '$id'";
  $run = mysqli_query($dbc, $query);
  if ($run) {
    header('location:operation.php');
  } else {
    echo "Error: " . mysqli_error($dbc);
  }
}
?>