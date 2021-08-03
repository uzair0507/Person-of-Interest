<?php
$db=mysqli_connect('localhost','root','','person_of_interest') or die("could not connect to database");


$sql="select * from crime";

$records=mysqli_query($db,$sql);


?>
<html>
     <link href='table.css' rel='stylesheet' >

<head>
    <title>Crime Details</title>
    </head>
  <h1>  <p><b>Crime Details</b></p>
      <a><img src=logo.png></a></h1>
<body>
    <table wiidth="2000" border="10" cellpadding="10" cellspacing="5">
   
    <tr>
        <th>Crime ID</th>
        <th>Crime Name</th>
        <th>Crime Place </th>
        <th>Crime Date</th>
      
        <tr>
    
    <?php 
       while($crime=mysqli_fetch_assoc($records)){
           
          echo"<tr>"; 
           
           
           
         echo"<td>".$crime['cri_id']."</td>";
         echo"<td>".$crime['cri_name']."</td>";
         echo"<td>".$crime['cri_place']."</td>";
         echo"<td>".$crime['cri_date']."</td>";
        
           echo"<tr>";    
       }
        
        ?>
    
        <h2><p> Go <a href=view.html ><b>Back</b></a> </p></h2>
    
    </table>
 
     
 
 
       
    </body>

   

</html>