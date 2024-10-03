<?php
    $serveur = "localhost";
    $utilisateur = "root";
    $motDePasse = "Tahani@123";
    $baseDeDonnees = "example_database";
    mysqli_report(MYSQLI_REPORT_OFF);
    
    $mysqli = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);
    
   if ($mysqli->connect_error) {
        die("Échec de la connexion à la base de données : " . $mysqli->connect_error);
   }


   if (isset($_GET['id'])) {
      $id = $_GET['id'];

    $query = "SELECT * FROM products WHERE id = ?";
    $statement = mysqli_prepare($mysqli,$query);
    mysqli_stmt_bind_param($statement,'i', $id);
    mysqli_stmt_execute($statement);
    $result = $statement->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        die("Product No Found.");
    }

    $statement->close();
   } else {
    die("Product ID No Specified .");
   }

$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>MyShop</title>
</head>
<body>
<div class="container my-5">
        <h2>Edit Product</h2>
<form action="edit.php" method="post"> 
            <div class="row mb-3">
               <label class="col-sm-3 col-form-label">ID</label>
               <div class="col-sm-6">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>">
               </div>               
            </div>   
            <div class="row mb-3">
               <label class="col-sm-3 col-form-label">LABEL</label>
               <div class="col-sm-6">
                  <input type="text" class="form-control" name="label" id="label" value="<?php echo $data['label']; ?>">
               </div>               
            </div>
            <div class="row mb-3">
               <label class="col-sm-3 col-form-label">CODE</label>
               <div class="col-sm-6">
                  <input type="text" class="form-control" id="code" name="code" value="<?php echo $data['code']; ?>">
               </div>               
            </div>
            <div class="row mb-3">
               <label class="col-sm-3 col-form-label">PRIX_INT</label>
               <div class="col-sm-6">
                  <input type="text" class="form-control" name="prixInitial" id="prixInitial" value="<?php echo $data['prixInitial']; ?>">
               </div>               
            </div>
            <div class="row mb-3">
               <label class="col-sm-3 col-form-label">PROMO_CODE</label>
               <div class="col-sm-6">
                  <input type="text" class="form-control" id="promoCode" name="promoCode" value="<?php echo $data['labepromoCodel']; ?>">
               </div>               
            </div>
            <div class="row mb-3">
               <label class="col-sm-3 col-form-label">DATE_EXP</label>
               <div class="col-sm-6">
                  <input type="date" class="form-control" name="dateExp" id="dateExp" value="<?php echo $data['dateExp']; ?>">
               </div>               
            </div>
            <div class="row mb-3">
               <label class="col-sm-3 col-form-label">PRIX_VENTE</label>
               <div class="col-sm-6">
                  <input type="text" class="form-control" name="prixVente" id="prixVente" value="<?php echo $data['prixVente']; ?>">
               </div>               
            </div>           
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                   <input type="submit" class="btn btn-primary" role="submit" value="OK">
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/MyShop/formulaireEdit.php?id" role="button">Cancel</a>
                </div>
            </div>
        </form>
</body>
</html>