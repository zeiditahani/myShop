<?php
if ( isset($_GET["id"]) ){
   $id = $_GET["id"];

   $servername = "localhost";
   $username = "root";
   $password = "Tahani@123";
   $database = "example_database";

   $connection =new mysqli($servername, $username, $password, $database);

   $sql = "DELETE FROM products WHERE id=$id";
   $connection->query($sql);

}
header("location: /MyShop/adminInterface.php");
?>