<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$conn = new mysqli('localhost','root','','page');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into registration(name, email, message)")
        values(?, ?, ?)");
    $stmt->bind_param("sssi",$name,$email,$message);
    $stmt->execute();
    echo "Sent message successfully...";
    $stmt->close();
    $conn->close();
}
?>