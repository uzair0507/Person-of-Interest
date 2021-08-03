<?php
$crim_id = $_POST['crim_id'];
$crim_name = $_POST['crim_name'];
$crim_age = $_POST['crim_age'];
$crim_addr = $_POST['crim_addr'];

//Database connection
$conn = new mysqli('localhost','root','','person_of_interest');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
    else{
        $sql = "CALL `getcriminal`();";
        $stmt = $conn->prepare("insert into criminal(crim_id, crim_name, crim_age, crim_addr)
        values(?, ?, ?, ?)");
        $stmt->bind_param("isis",$crim_id, $crim_name, $crim_age, $crim_addr);
        $stmt->execute(); 
        print_r($criminal); 
        echo "Successfully Inserted...";
        $stmt->close();
        $conn->close();
         header("Location:main.html");
    }
?>
