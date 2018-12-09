<?php
$name = $_POST['name'];
$address = $_POST['address'];
$phonenumber = $_POST['phonenumber'];
$quantity = $_POST['quantity']; 
saveToDatabase($name, $address, $phonenumber, $quantity);
header('Location:success.html');


function saveToDatabase($name, $address, $phonenumber, $quantity){
$serverName = "localhost";
$database = "menu_site";
$username = "root";
$pass_word = "";
//Open database connection
$conn = mysqli_connect($serverName, $username, $pass_word, $database);
// Check that connection exists
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO delivery (name, address, phonenumber, quantity, created_at)
VALUES ('$name', '$address', '$phonenumber', '$quantity', NOW())";
$result = mysqli_query($conn, $sql);
//Check for errors
if (!$result) {
die("Error: " . $sql . "<br>" . mysqli_error($conn));
}
//Close the connection
mysqli_close($conn);
}

?>