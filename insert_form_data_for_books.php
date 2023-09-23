<?php 
/*
Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password)
*/
$link = mysqli_connect("localhost", "root", "PASSWORD@#$", "products");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$iD = mysqli_real_escape_string($link, $_POST['id']);
$title = mysqli_real_escape_string($link, $_POST['title']);
$author = mysqli_real_escape_string($link, $_POST['author']);
$category = mysqli_real_escape_string($link, $_POST['category']);
$isbn = mysqli_real_escape_string($link, $_POST['isbn']);
$price = mysqli_real_escape_string($link, $_POST['price']);
$stock = mysqli_real_escape_string($link, $_POST['stock']);

 
// attempt insert query execution
$sql = "INSERT INTO books (ID, Title, Author, Category, ISBN, Price, Stock) 
  VALUES ('$iD', '$title', '$author', '$category', '$isbn', '$price', '$stock')";
if(mysqli_query($link, $sql)){
    echo "<h1>Records added successfully.</h1>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>