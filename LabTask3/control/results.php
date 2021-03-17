<?php
include('db.php');
$validateall=""; 
$validatename="";
$validateemail="";
$validatepass="";
$validateradio="";
$v1 = $v2 = $v3 ="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    
    
 
$name1=$_REQUEST["fname"]; 
$name=$_REQUEST["Uname"];
$email=$_REQUEST["email"];
$pass=$_REQUEST["pname"];
$Cpass=$_REQUEST["cname"];
$gender=$_REQUEST["gender"];
 
$date= $_REQUEST["date"];
 

$connection = new db();
$conobj=$connection->OpenCon();

$userQuery=$connection->InsertData($conobj,"registrationInfo",$name1,$email,$name,$pass,$Cpass,$gender,$date);
$connection->CloseCon($conobj);
if(empty($name1) ||empty($name) ||empty($email) ||empty($pass) ||empty($Cpass)||empty($date))
{
  $validateall="You must enter all information";
}
else{
if((strlen($name)<5) ||!preg_match("/[a-zA-Z0-9._]+/", $name))
{
    $validatename="You must enter user name";
}
else
{
    $validatename= "your user name is ".$name;
}
  
if((strlen($pass)<8) ||!preg_match("/(?=.*[@#$%^&+=]).*$/",$pass))
{
    $validatename="You must enter password";
}
else
{
    $validatepass= "your password is ".$pass;
}
if($pass==$Cpass)
{
   $v1= "Both Password match";
  
}
else
{
    $v1="password does not match";
}


if(empty($email) || !preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$/i", $email))
{
    $validateemail="You must enter email";
}
else
{
    $validateemail= "your email is ".$email;
}
 
if(isset($gender))
{
    $validateradio=$gender;
}
else{
    $validateradio="Please select an option for gender";
}
}
$target_dir= "files/";
$target_file = $target_dir .basename($_FILES["fileToUpload"]["name"]);


if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file))
 {
echo "<img src='".$target_file."'>";
} 
else {
echo "Sorry, there was an error uploading your file";
}
}
?>






