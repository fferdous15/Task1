<?php 
    $validatename="";
    $validateusername="";
    $validateemail="";
    $validatecheckbox="";
    $validateradio="";
    $validategender="";
    $v1=$v2=$v3="";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $name=$_REQUEST["fname"];
      $email=$_REQUEST["email"];

      if(empty($name) || strlen($name) < 3) {
          $validatename="you must enter valid name";
      } else {
          $validatename="your name is ".$name;
      }

      if(empty($username) || !preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)$/i",$username)) {
        $validateusername="you must enter a valid username";
    } else {
          $validateusername="your username is ".$username;
    }

      if(empty($email) || !preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email)) {
          $validateemail="your must enter valid email";
      } else {
          $validateemail="your email is ".$email;
      }

      if(empty($password) || strlen($password) < 8 || !preg_match()) {
        $validatename="you must enter a valid password";
    } else {
        $validatepassword="".$password;
    }

      if(!isset($_REQUEST["gender"])) {
        $validategender="Please select your gender";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise</title>
</head>
<body>
<h1>REGISTRATION </h1>

<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">


  <label>Name           :</label>
  <input type="text" id="fname" name="fname"> <?php echo $validatename; ?>
  <br><br>

  <label>Email          :</label>
  <input type="text" id="lname" name="lname"><?php echo $validateemail; ?>
  <br><br>

  <label>User name         :</label>
  <input type="text"><?php echo $validateusername; ?>
  <br><br>

  <label>Password         :</label>
  <input type="text"><br><br>

  <label>Confirm Password         :</label>
  <input type="text"><br><br>

  <label>Gender         :</label><?php echo $validategender ?>
  <br><br>
  <input type="radio" id="male" name="gender" value="Male">
  <label for="Male">Male</label>
  <input type="radio" id="female" name="gender" value="Female">
  <label for="Female">Female</label>
  <input type="radio" id="other" name="gender" value="Other">
  <label for="Other">Other</label><br><br>

  <label>Date of Birth</label><br><br>
  <input type="date"><br><br>

  <input type="submit" value = "SUBMIT"> 
  <input type="reset" value = "RESET">

</form>

</body>
</html>