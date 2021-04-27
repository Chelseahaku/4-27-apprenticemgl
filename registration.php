<?php

function xoosonbish($field){
  if($field != "") {
    return true;
  } return false;
}

if(isset($_POST['email'])) {
    foreach($_POST as $index => $data) {
      if(xoosonbish($data) == false) {
        die('xooson baina' . $index);
      }
    }

    if($_POST['password'] != $_POST['password_confirmation']) {
      header('Location: /register.php?error=confirmation');
    }

    $email = $_POST['email'];
    $username = $_POST['username'];
    
  $serverip = "localhost";
  $username = "root";
  $password = "asdfasdffsad";
  $dbname = "apprenticemn";

  // Create connection
  $conn = new mysqli($serverip, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    header("Location: /register.php?error=database");
  }

  $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    header("Location: /register.php?error=email");
  }

  $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    header("Location: /register.php?error=username");
  }

  //insert!!!!

  $conn->close();

} else {
  header("Location: /register.php?");
}
?>