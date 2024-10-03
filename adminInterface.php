
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
        <h2>List of Products</h2>
        <a class="btn btn-primary" href="/MyShop/formulaireCreation.php" role="button">New Product</a>
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
/*Requete SQL pour creer une table
$tableQuery = "
dh   CREATE TABLE IF NOT EXISTS products (
   id INT PRIMARY KEY AUTO_INCREMENT,
   label VARCHAR(50) ,
   code VARCHAR(50) ,
   prixInitial varchar(20),
   promoCode VARCHAR(50),
   dateExp VARCHAR(50),
   prixVente VARCHAR(50)
   )";
//execution de la requete
if($connection->query($tableQuery)){
    echo "bien cree";
}else{
    echo "pas cree";
}
//fermeture de la connexion
//insertion des donnees
$sql = "INSERT INTO 
products (label , code, prixInitial, promoCode, dateExp, prixVente) VALUES ('shampoing_Femme' ,'0022', 34, 4, '12/5/2025', 40)";
if (mysqli_query($connection, $sql)){
    echo "added successuf";
}else{
    echo "try again :( ". $sql ."<br>" . mysql_error($connection);
}
$connection->close(); 

mysqli_select_db($connection, 'example_database');
if($result = mysqli_query($connection, "SELECT * from products ")){
    echo "rows are :". mysqli_num_rows($result) ."</br>";
}
mysqli_fetch_array ($result);
while ($data = mysqli_fetch_array($result)){
    echo $data['label']." ".$data['code']." ".
    $data['prixInitial']." ".$data['promoCode'].
    " ".$data['dateExp'].$data['prixVente']."</br>";
       // echo "rows are :". mysqli_num_rows($result) ."</br>";
}*/
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
    <a class='btn btn-primary btn-sm' href='/MyShop/formulaireEdit.php?id=$data[id]'>Edit</a>
    <a class='btn btn-danger btn-sm' href='/MyShop/delete.php?id=$data[id]'>Delete</a>
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
