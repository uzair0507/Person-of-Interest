<?php
$judgement_id = $_POST['judgement_id'];
$judge_id = $_POST['judge_id'];
$crim_id = $_POST['crim_id'];
$judgement = $_POST['judgement'];
$judge_date = $_POST['judge_date'];


//Database connection
$conn = new mysqli('localhost','root','','person_of_interest');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
    else{
        $stmt = $conn->prepare("insert into judgement (judgement_id, judge_id, crim_id, judgement, judge_date)
        values(?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiss",$judgement_id, $judge_id, $crim_id, $judgement, $judge_date);
        $stmt->execute();
        echo "Successfully Inserted...";
        $stmt->close();
        $conn->close();
         header("Location:dum.html");
    }
?>
