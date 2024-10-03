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
        <h2>New Product</h2>
<form action="create.php" method="post">    
            <div class="row mb-3">
               <label class="col-sm-3 col-form-label">LABEL</label>
               <div class="col-sm-6">
                  <input type="text" class="form-control" name="label" value="">
               </div>               
            </div>
            <div class="row mb-3">
               <label class="col-sm-3 col-form-label">CODE</label>
               <div class="col-sm-6">
                  <input type="text" class="form-control" name="code" value="">
               </div>               
            </div>
            <div class="row mb-3">
               <label class="col-sm-3 col-form-label">PRIX_INT</label>
               <div class="col-sm-6">
                  <input type="text" class="form-control" name="prixInitial" value="">
               </div>               
            </div>
            <div class="row mb-3">
               <label class="col-sm-3 col-form-label">PROMO_CODE</label>
               <div class="col-sm-6">
                  <input type="text" class="form-control" name="promoCode" value="">
               </div>               
            </div>
            <div class="row mb-3">
               <label class="col-sm-3 col-form-label">DATE_EXP</label>
               <div class="col-sm-6">
                  <input type="date" class="form-control" name="dateExp" value="">
               </div>               
            </div>
            <div class="row mb-3">
               <label class="col-sm-3 col-form-label">PRIX_VENTE</label>
               <div class="col-sm-6">
                  <input type="text" class="form-control" name="prixVente" value="">
               </div>               
            </div>           
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/MyShop/adminInterface.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
</body>
</html>