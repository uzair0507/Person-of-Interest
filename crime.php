<?php
$cri_id = $_POST['cri_id'];
$cri_name = $_POST['cri_name'];
$cri_place = $_POST['cri_place'];
$cri_date = $_POST['cri_date'];


//Database connection
$conn = new mysqli('localhost','root','','person_of_interest');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
    else{
        $stmt = $conn->prepare("insert into crime(cri_id, cri_name, cri_place, cri_date)
        values(?, ?, ?, ?)");
        $stmt->bind_param("isss",$cri_id, $cri_name, $cri_place, $cri_date);
        $stmt->execute();
        echo "Successfully Inserted...";
        $stmt->close();
        $conn->close();
         header("Location:main.html");
    }
?>