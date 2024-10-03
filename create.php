<?php
$servername = "localhost";
$username = "root";
$password = "Tahani@123";
$dbname = "example_database";
mysqli_report(MYSQLI_REPORT_OFF);


// Créer une connexion
$conn =new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
    die("La connexion a échoué : " . mysqli_connect_error());
}

// Récupérer les données du formulaire
$label = $_POST['label'];
$code = $_POST['code'];
$prixInitial = $_POST['prixInitial'];
$promoCode = $_POST['promoCode'];
$dateExp = $_POST['dateExp'];
$prixVente = $_POST['prixVente'];


// Créer et exécuter la requête d'insertion
$sql = "INSERT INTO products (label, code, prixInitial, promoCode, dateExp, prixVente ) VALUES ('$label', '$code', '$prixInitial' , '$promoCode', '$dateExp', '$prixVente')";
if (mysqli_query($conn, $sql)) {
    echo "Product added successfuly";
    header("location: /MyShop/adminInterface.php");
} else {
    echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
}

// Fermer la connexion
mysqli_close($conn);
?>