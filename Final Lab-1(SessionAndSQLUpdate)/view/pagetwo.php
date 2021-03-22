<?php
session_start(); 

include('../control/updatecheck.php');


if(empty($_SESSION["username"])) // Destroying All Sessions
{
header("Location: ../control/login.php"); // Redirecting To Home Page
}

?>

<!DOCTYPE html>
<html>
<body>
<h2>Profile Page</h2>

Hii, <h3><?php echo $_SESSION["username"];?></h3>
<br>Your Profile Page.
<br><br>
<?php
$radio1=$radio2=$radio3="";
$firstname=$email=$password=$address=$date=$profession="";
$connection = new db();
$conobj=$connection->OpenCon();

$userQuery=$connection->CheckUser($conobj,"student",$_SESSION["username"],$_SESSION["password"]);

if ($userQuery->num_rows > 0) {

    // output data of each row
    while($row = $userQuery->fetch_assoc()) {
      $firstname=$row["firstname"];
      $email=$row["email"];
      $password=$row["password"];
      $address=$row["address"];
      $dob=$row["dob"];
      $profession=$row["profession"];
      $interests=$row["interests"]; 
      $in = "";
      $pattern="/[+]/";
      $in = preg_split($pattern,$interests);
      $checkbox1=$checkbox2=$checkbox3=$checkbox4=$checkbox5=$checkbox6="";
      if($in[0]=='music'|| $in[1]=='music' || $in[2]=='music' || $in[3]=='music' || $in[4]=='music' || $in[5]=='music'){
        $checkbox1 = "checked";
      }
      if($in[0]=='sports'|| $in[1]=='sports' || $in[2]=='sports' || $in[3]=='sports' || $in[4]=='sports' || $in[5]=='sports'){
        $checkbox2 = "checked";
      }
      if($in[0]=='videoGames'|| $in[1]=='videoGames' || $in[2]=='videoGames' || $in[3]=='videoGames' || $in[4]=='videoGames' || $in[5]=='videoGames'){
        $checkbox3 = "checked";
      }
      if($in[0]=='gardening'|| $in[1]=='gardening' || $in[2]=='gardening' || $in[3]=='gardening' || $in[4]=='gardening' || $in[5]=='gardening'){
        $checkbox4 = "checked";
      }
      if($in[0]=='reading'|| $in[1]=='reading' || $in[2]=='reading' || $in[3]=='reading' || $in[4]=='reading' || $in[5]=='reading'){
        $checkbox5 = "checked";
      }
      if($in[0]=='cooking'|| $in[1]=='cooking' || $in[2]=='cooking' || $in[3]=='cooking' || $in[4]=='cooking' || $in[5]=='cooking'){
        $checkbox6 = "checked";
      }

      if(  $row["gender"]=="female" )
      { $radio1="checked"; }
      else if($row["gender"]=="male")
      { $radio2="checked"; }
      else{$radio3="checked";}

      $option1=$option2=$option3=$option4=$option5=$option6=$option7=$option8="";
      
      if($profession=="Accountant" )
      { $option1="selected"; }
      else if($profession=="Academician")
      { $option2="selected"; }
      else if($profession=="Doctor")
      { $option3="selected"; }
      else if($profession=="Engineer")
      { $option4="selected"; }
      else if($profession=="Teacher")
      { $option5="selected"; }
      else if($profession=="Lawyer")
      { $option6="selected"; }
      else if($profession=="Pharmacist")
      { $option7="selected"; }
      else if($profession=="Student")
      { $option8="selected"; }
   
  } 
}
  else {
    echo "0 results";
  }

echo $option5;
?>
<form action='' method='post'>
firstname: <input type='text' name='firstname' value="<?php echo $firstname; ?>" >
<br>
password: <input type="text" name='password' value="<?php echo $password; ?>">
<br>
email: <input type='text' name='email' value="<?php echo $email; ?>" >
<br>
Address: <input type="text" name='address' value="<?php echo $address; ?>">
<br>
Date: <input type="date" name='dob' value="<?php echo $dob; ?>">
<br>
 <label for="gender">Gender: </label>
     <input type='radio' name='gender' value='female'<?php echo $radio1; ?>>Female
     <input type='radio' name='gender' value='male' <?php echo $radio2; ?> >Male
     <input type='radio' name='gender' value='other'<?php echo $radio3; ?> > Other
<br>
<label for="profession">Profession: </label>
<select name="profession">
  <option value="Accountant" <?php echo $option1;?>>Accountant</option>
  <option value="Academician" <?php echo $option2;?>>Academician</option>
  <option value="Doctor" <?php echo $option3;?>>Doctor</option>
  <option value="Engineer" <?php echo $option4;?>>Engineer</option>
  <option value="Teacher" <?php echo $option5;?>>Teacher</option>
  <option value="Lawyer" <?php echo $option6;?>>Lawyer</option>
  <option value="Pharmacist" <?php echo $option7;?>>Pharmacist</option>
  <option value="Student" <?php echo $option8;?>>Student</option>
</select> 
<br>
<label for="interest">Interest: </label>
<input type="checkbox" name="interest1" value='music' <?php echo $checkbox1; ?>>
<label for="interest1">Music</label>
<input type="checkbox" name="interest2" value='sports' <?php echo $checkbox2; ?>>
<label for="interest2">Sports</label>
<input type="checkbox" name="interest3" value='videoGames' <?php echo $checkbox3; ?>>
<label for="interest3">Video Games</label>
<input type="checkbox" name="interest4" value='gardening' <?php echo $checkbox4; ?>>
<label for="interest4">Gardening</label>
<input type="checkbox" name="interest5" value='reading' <?php echo $checkbox5; ?>> 
<label for="interest5">Reading</label>
<input type="checkbox" name="interest6" value='cooking' <?php echo $checkbox6; ?>>
<label for="interest6">Cooking</label>
<br>
     <input name='update' type='submit' value='Update'>  

     <?php echo $error; ?>
<br>
<br>
<a href="../view/pageone.php">Back </a>
<br>
<a href="../control/logout.php"> logout</a>

</body>
</html>