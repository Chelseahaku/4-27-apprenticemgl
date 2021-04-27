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
  // SELECT * FROM `users` WHERE `email` = 'i+0@apprentice.mn' OR `username` = 'username2'
  die('connected xolbogdson');
  $conn->close();

  $sql = "SELECT * FROM `users`";

  for($x=0; $x<100; $x++) {
    $sql = "INSERT INTO users (email, password, name, username) VALUES ('i+1$x@apprentice.mn', 'asdfasdf+1$x', 'Apprentice MGL+1$x', 'apprenticemn+1$x');";
    echo $x;

    // $hariu = $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
      echo "+" . "<br>";
    } else {
      echo "Error: " . $sql . "<hr>" . $conn->error;
      die();
    }
  }

    /*
    INSERT INTO `users` 
           (`username`, `email`,          `password`, `name`) 
    VALUES ('apprenticemgl', 'i@apprentice.mn', 'asdfasdfafsdfas', 'Apprentice MGL');
    */
    // $hariu = calculate($oo1, $oo2, $uildel);
    /*
    UPDATE `users` SET `email` = 'apprenticemgl@gmail.com' WHERE id = 1;
    */

    /*
    DELETE FROM `users` WHERE `email` = 'i+1212@apprentice.mn';
    */

    /*
    SELECT * FROM `users`;

    SELECT * FROM `users` where username = 'username2' AND id = 1
    */
} else {
  header("Location: /register.php?");
}
?>