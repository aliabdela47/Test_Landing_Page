<?php
    $user_id = $_POST['user_id'];
    $firstName = $_POST['firstName'];
    $lastName= $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];
   // Database connection
   $conn = new mysqli('localhost','root','2447'@#','registration_form');
   if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
   } else {
    $stmt = $conn->prepare("INSERT INTO registration(user_id, firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $user_id, $firstName, $lastName, $gender, $email, $password, $number);
    $stmt->execute();
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
