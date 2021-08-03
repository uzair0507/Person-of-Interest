<?php

$db=mysqli_connect('localhost','root','','person_of_interest') or die("could not connect to database");
$vic_id = mysqli_real_escape_string($db,$_POST['vic_id']);

$sql="select * from fir1 where vic_id='$vic_id'";

$records=mysqli_query($db,$sql);


?>
<html>
     <link href='table.css' rel='stylesheet' >

<head>
    <title>FIR Details</title>
    </head>
  <h1>  <p><b>  FIR DETAILS</b></p>
      <a><img src=logo.png></a></h1>
<body>
    <table wiidth="2000" border="10" cellpadding="5" cellspacing="5">
   
    <tr>
        <th>FIR No.</th>
        <th>Victim ID</th>
        <th>Crime ID</th>
        <th>Criminal ID</th>
      
        <tr>
    
    <?php 
       while($fir1=mysqli_fetch_assoc($records)){
           
          echo"<tr>"; 
           
           
           
         echo"<td>".$fir1['fir_id']."</td>";
         echo"<td>".$fir1['vic_id']."</td>";
         echo"<td>".$fir1['cri_id']."</td>";
         echo"<td>".$fir1['crim_id']."</td>";
        
           echo"<tr>";    
       }
        
        ?>
    
        <h2><p> Go <a href=view.html ><b>Home</b></a> </p></h2>
        <h3><p>Go Back To <a href=victim1.php ><b>Victim</b></a> </p></h3>
    
    </table>
 
     
 
 
       
    </body>

   

</html>