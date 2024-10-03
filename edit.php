<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect('localhost', 'root', 'Tahani@123', 'example_database');


if ($mysqli->connect_error) {
    die("Échec de la connexion à la base de données : " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $label = htmlspecialchars($_POST["label"]);
    $code = htmlspecialchars($_POST["code"]);
    $prixInitial = htmlspecialchars($_POST["prixInitial"]);
    $promoCode = htmlspecialchars($_POST["promoCode"]);
    $dateExp = htmlspecialchars($_POST["dateExp"]);
    $prixVente = htmlspecialchars($_POST["prixVente"]);

    if (empty($label) || empty($code) || empty($prixInitial) || empty($promoCode) || empty($dateExp) || empty($prixVente)) {
        echo "<script>alert('Tous les champs sont obligatoires.');</script>";
        echo "<script>window.history.go(-1);</script>";
        exit();
    }
$stmt = mysqli_prepare($mysqli, "UPDATE products SET label = ? , code = ?  , prixInitial = ? , promoCode = ? , dateExp = ? , prixVente = ?  WHERE id =? ");
mysqli_stmt_bind_param($stmt, 'ssssssi',$label,  $code, $prixInitial, $promoCode, $dateExp, $prixVente, $id);

if (mysqli_stmt_execute($stmt)){
    echo "<script>alert('Product updated successufuly .');</script>";
    echo "<script>window.location.href='adminInterface.php';</script>";
} else {
    echo "<script>alert('Erreur lors de la mise à jour du Product. Veuillez réessayer.');</script>";
    echo "<script>window.history.go(-1);</script>";
}
$stmt->close();
} else {
    echo "<script>window.location.href='adminInterface.php';</script>";
    exit();
}

printf("%d row updated.\n", mysqli_stmt_affected_rows($stmt));


$mysqli->close();

?>