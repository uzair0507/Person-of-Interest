<?php
$db=mysqli_connect('localhost','root','','person_of_interest') or die("could not connect to database");


$sql="select * from victim";

$records=mysqli_query($db,$sql);


?>
<html>
     <link href='table.css' rel='stylesheet' >

<head>
    <title>Victim Details</title>
    </head>
  <h1>  <p><b>Victim Details</b></p>
      <a><img src=logo.png></a></h1>
<body>
    <table wiidth="2000" border="10" cellpadding="10" cellspacing="5">
   
    <tr>
        <th>Victim ID</th>
        <th>Victim Name</th>
        <th>Victim Age </th>
        <th>Victim Address</th>
      
        <tr>
    
    <?php 
       while($victim=mysqli_fetch_assoc($records)){
           
          echo"<tr>"; 
           
           
           
         echo"<td>".$victim['vic_id']."</td>";
         echo"<td>".$victim['vic_name']."</td>";
         echo"<td>".$victim['vic_age']."</td>";
         echo"<td>".$victim['vic_addr']."</td>";
        
           echo"<tr>";    
       }
        
        ?>
    
        <h2><p> Go <a href=view.html ><b>Back</b></a> </p></h2>
            <h3><p> View <a href=fir2.html ><b>FIR</b></a> </p></h3>
    
    </table>
 
     
 
 
       
    </body>

   

</html>