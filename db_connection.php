<?php

 $config = parse_ini_file('.db.ini');

function connect(){
    $con = mysqli_connect("localhost", $GLOBALS['config']['username'], $GLOBALS['config']['password'], $GLOBALS['config']['db']);
    if(!$con){
        die("Failed to connect to Database"); 
    }
    return $con;
}

function insert_data($name, $lastname, $email){
    $sql = "INSERT INTO " . $GLOBALS['config']['table'] . "(name, lastname, email)
    VALUES ('$name', '$lastname', '$email')";

    return $sql;
}


$conn = connect();
$sql = insert_data($_POST['name'], $_POST['lastname'], $_POST['email']);

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
 }

?> 