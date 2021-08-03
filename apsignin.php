<?php
session_start();
$errors=array();
$db=mysqli_connect('localhost','root','','person_of_interest') or die("could not connect to database");

$user_id="";
if(isset($_POST['Login'])){

          $user_id=mysqli_real_escape_string($db, $_POST['user_id']);
          $password=mysqli_real_escape_string($db, $_POST['user_passwd']);
    
    if(empty($user_id))
    {    array_push($errors,"User Phone is required");}
      if(empty($password))
    {    array_push($errors,"Password Is Required");}
    
    if(count($errors)==0){
       
        
        $query="select * from user where user_id='$user_id' and user_passwd='$password' and user_type='Authorized Personnel' ";
          
          $results=mysqli_query($db,$query);
              
          if(mysqli_num_rows($results)) {
              $_SESSION['ph_no']=$user_id;
              $_SESSION['success']="logged in successfully";
              header('location: dum.html');
          } 
        else{
               header("location:wrong.html");
        }      
              
          }
        
        
        
    }
?>
        