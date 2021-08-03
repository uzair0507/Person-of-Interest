<?php
$vic_id = $_POST['vic_id'];
$vic_name = $_POST['vic_name'];
$vic_age = $_POST['vic_age'];
$vic_addr = $_POST['vic_addr'];


//Database connection
$conn = new mysqli('localhost','root','','person_of_interest');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
    else{
        $stmt = $conn->prepare("insert into victim(vic_id, vic_name, vic_age, vic_addr)
        values(?, ?, ?, ?)");
        $stmt->bind_param("isis",$vic_id, $vic_name, $vic_age, $vic_addr);
        $stmt->execute();
        echo "Successfully Inserted...";
        $stmt->close();
        $conn->close();
         header("Location:main.html");
    }
?>
