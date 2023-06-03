<?php
    $user_id = $_POST['user_id'];
    $firstName = $_POST['firstName'];
    $lastName= $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];
   // Database connection
   $conn = new mysql(Server='aliabdelaali.tech';Port='3306';Database='registration_form';Uid'=root';Pwd='2447');
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
