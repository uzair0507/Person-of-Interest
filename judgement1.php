<?php

$db=mysqli_connect('localhost','root','','person_of_interest') or die("could not connect to database");
$crim_id = mysqli_real_escape_string($db,$_POST['crim_id']);

$sql="select * from judgement where crim_id='$crim_id'";

$records=mysqli_query($db,$sql);


?>
<html>
     <link href='table.css' rel='stylesheet' >

<head>
    <title>Judgement Details</title>
    </head>
  <h1>  <p><b>  JUDGEMENT DETAILS</b></p>
      <a><img src=logo.png></a></h1>
<body>
    <table wiidth="2000" border="10" bordercolor="#00000" cellpadding="5" cellspacing="5">
   
    <tr>
        <th>Judgement ID</th>
        <th>Judge ID</th>
        <th>Criminal ID</th>
        <th>Judgement</th>
        <th>Judgement Date</th>
      
        <tr>
    
    <?php 
       while($judgement=mysqli_fetch_assoc($records)){
           
          echo"<tr>"; 
           
           
           
         echo"<td>".$judgement['judgement_id']."</td>";
         echo"<td>".$judgement['judge_id']."</td>";
         echo"<td>".$judgement['crim_id']."</td>";
         echo"<td>".$judgement['judgement']."</td>";
         echo"<td>".$judgement['judge_date']."</td>";
        
           echo"<tr>";    
       }
        
        ?>
    
        <h2><p> Go Back To <a href=view.html ><b>Home</b></a> </p></h2>
        <h3><p>Go Back To <a href=judgement1.html ><b>Criminal</b></a> </p></h3>
    
    </table>
 
     
 
 
       
    </body>

   

</html>