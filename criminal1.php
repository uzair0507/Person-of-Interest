<?php
$db=mysqli_connect('localhost','root','','person_of_interest') or die("could not connect to database");


$sql="select * from criminal";

$records=mysqli_query($db,$sql);


?>
<html>
     <link href='table.css' rel='stylesheet' >

<head>
    <title>Criminal Details</title>
    </head>
  <h1>  <p><b>Criminal Details</b></p>
      <a><img src=logo.png></a></h1>
<body>
    <table wiidth="2000" border="10" cellpadding="10" cellspacing="5">
   
    <tr>
        <th>Criminal ID</th>
        <th>Criminal Name</th>
        <th>Criminal Age </th>
        <th>Criminal Address</th>
      
        <tr>
    
    <?php 
       while($criminal=mysqli_fetch_assoc($records)){
           
          echo"<tr>"; 
           
           
           
         echo"<td>".$criminal['crim_id']."</td>";
         echo"<td>".$criminal['crim_name']."</td>";
         echo"<td>".$criminal['crim_age']."</td>";
         echo"<td>".$criminal['crim_addr']."</td>";
        
           echo"<tr>";    
       }
        
        ?>
    
        <h2><p> Go <a href=view.html ><b>Back</b></a> </p></h2>
            <h3><p> Judgement <a href=judgement1.html ><b>View</b></a> </p></h3>
    
    </table>
 
     
 
 
       
    </body>

   

</html>