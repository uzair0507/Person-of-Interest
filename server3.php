<?php
session_start();
$user_id="";
$username="";
$user_phone="";


$errors=array();

$db=mysqli_connect('localhost','root','','person_of_interest') or die("could not connect to database");

if(isset($_POST['Signup'])){
$user_id = mysqli_real_escape_string($db,$_POST['user_id']);
$username = mysqli_real_escape_string($db,$_POST['username']);
$user_phone = mysqli_real_escape_string($db,$_POST['user_phone']);
$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);
$user_type = mysqli_real_escape_string($db,$_POST['user_type']);

if(empty($user_id))array_push($errors,"user_id is required");
if(empty($password_1))array_push($errors,"password is required");
                       
if($password_1!=$password_2){array_push($errors,"passwords should match");
                       header("location:match.html");}
if(empty($user_type))array_push($errors,"user_type is required");
    
$user_check_query="select * from user where user_id='$user_id' LIMIT 1`";
$results=mysqli_query($db,$user_check_query);
$user=mysqli_fetch_assoc($results);

if($user){
    if($user['user_id']==$user_id){array_push($errors,"User ID already exists");
                               header("location:already.html");}
}


if(count($errors)==0)
{
   
    $query="insert into user (user_id, username, user_phone, user_type, user_passwd) values ('$user_id','$username','$user_phone','$user_type','$password_1')";
    mysqli_query($db,$query);
    
    if($user_type=='Authorized Personnel'){
    $_SESSION['user_id']=$user_id;
    $_SESSION['success']="Successfully Logged In";
    header("location:dum.html");
}
    elseif($user_type=='Civilian')
    {
    $_SESSION['user_id']=$user_id;
    $_SESSION['success']="Successfully Logged In";
    header("location:view.php");
     }
    else{
        echo("Not A Valid User Type"); }
}
}

?>
