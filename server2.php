<?php
session_start();

$user_id="";


$errors=array();

$db=mysqli_connect('localhost','root','','person_of_interest') or die("could not connect to database");

if(isset($_POST['Reset'])){
$user_id = mysqli_real_escape_string($db,$_POST['user_id']);
$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);

if(empty($user_id))array_push($errors,"User ID is required");
if(empty($password_1))array_push($errors,"password is required");
if($password_1!=$password_2){array_push($errors,"passwords should match");
                             header("location:match.html");}
    
if(count($errors)==0)
{
    $query="select * from user where user_id='$user_id' ";
          
          $results=mysqli_query($db,$query);
              
          if(mysqli_num_rows($results)) {
    $query1="update user set user_passwd='$password_1' where user_id='$user_id'";
    mysqli_query($db,$query1);
    
    
    $_SESSION['user_id']=$user_id;
    $_SESSION['success']="password successfully changed ";
    header("location:home.html");
}
    else  { header("location:notexist.html");}   
}
}
    
?>
