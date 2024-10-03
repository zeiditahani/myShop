<?php
if ( isset($_GET['id']) ){
    $id = $_GET['id'];
 
    $servername = "localhost";
    $username = "root";
    $password = "Tahani@123";
    $database = "example_database";
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli =new mysqli($servername, $username, $password, $database);

     
    $stmt = mysqli_prepare($mysqli,"UPDATE products SET nblike = nblike + 1 WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "s", $id);
    if (mysqli_stmt_execute($stmt)){
        echo "<script>window.location.href='userInterface.php';</script>";
    } else {
        echo "<script>alert('Erreur lors de la mise à jour du Product. Veuillez réessayer.');</script>";
        echo "<script>window.history.go(-1);</script>";
    }
    $stmt->close();
    } else {
    echo "<script>window.location.href='userInterface.php';</script>";
    exit();
    }
?>
