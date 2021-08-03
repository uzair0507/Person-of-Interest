<?php
$fir_id = $_POST['fir_id'];
$vic_id = $_POST['vic_id'];
$cri_id = $_POST['cri_id'];
$crim_id = $_POST['crim_id'];


//Database connection
$conn = new mysqli('localhost','root','','person_of_interest');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
    else{
        $stmt = $conn->prepare("insert into fir1(fir_id, vic_id, cri_id, crim_id)
        values(?, ?, ?, ?)");
        $stmt->bind_param("iiii",$fir_id, $vic_id, $cri_id, $crim_id);
        $stmt->execute();
        echo "Successfully Inserted...";
        $stmt->close();
        $conn->close();
         header("Location:../main.html");
    }
?>
