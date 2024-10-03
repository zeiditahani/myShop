
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css ">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>MyShop</title>
</head>
<body>
    <div class="container my-5">
        <h1>MyShop</h1>
        <h2>List of Products</h2>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>LABEL</td>
                    <td>CODE</td>
                    <td>PRIX_INT</td>
                    <td>PROMO_CODE</td>
                    <td>DATE_EXP</td>
                    <td>PRIX_VENTE</td>
                    <td>LIKE</td>
                    <td>STOCK</td>
                </tr>
            </thead>
        <tbody>
<?php
$servername = "localhost";
$username = "root";
$password = "Tahani@123";
$database = "example_database";
mysqli_report(MYSQLI_REPORT_OFF);

//create connection
$connection = mysqli_connect($servername, $username, $password, $database);
//check connection
if ($connection->connect_error){
    die("connection failed: ".$connection->connect_error);
}
mysqli_select_db($connection, 'example_database');
$result = mysqli_query($connection, "SELECT * from products ");
mysqli_fetch_array ($result);
while ($data = $result->fetch_assoc()){
    echo "
    
<tr>
    <td>$data[id]</td>
    <td>$data[label]</td>
    <td>$data[code]</td>
    <td>$data[prixInitial]</td>
    <td>$data[promoCode]</td>
    <td>$data[dateExp]</td>
    <td>$data[prixVente]</td>
    <td>$data[nblike]</td>
    <td>$data[stock]</td>
    <td>
    <a class='btn btn-info btn-sm' href='/MyShop/like.php?id=$data[id]'>Like</a>
    <a class='btn btn-success btn-sm' href='/MyShop/buy.php?id=$data[id]'>Buy</a>
    </td>
</tr>
    ";
}

?>
           </tbody>
        </table>


    </div>
    
</body>
</html>
