<?php
class db{
 
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "mydb";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
 
 return $conn;
 }
 function InsertData($conn,$table,$name1,$email,$name,$pass,$Cpass,$gender,$date)
 {
    $sql = "INSERT INTO $table (Name, Email, User_Name, Password,Confirm_Password, Gender, Date_OfBirth) 
    VALUES ('$name1', '$email','$name', '$pass' ,'$Cpass','$gender','$date')";
    
$result = $conn->query($sql);
if($result)
{ 
    echo "new record inserted"; 
    return $result;
}
else
{
     echo "error occurred".$conn->error;
 }
  
 }


 function ShowAll($conn,$table)
 {
$result = $conn->query("SELECT * FROM  $table");
 return $result;
 }


function CloseCon($conn)
 {
 $conn -> close();
 }
}
?>