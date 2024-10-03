
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path_to_bootstrap_css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>MyShop</title>
</head>
<body>
<div class="container my-5">
    <h2>MyShop Form </h2>
    <script src="path_to_bootstrap_js/bootstrap.bundle.min.js"></script>

    <p><span class="error">* required field</span></p>
    <form  method="post" >  
            <div class="row mb-3">
              <label for="username" class="col-sm-3 col-form-label">Name: </label>
              <div class="col-sm-6">
              <input type="text" class="form-control" id="username" name="username" value="">
              <span class="error">* </span>
              <br><br>
              </div>               
            </div>
            <div class="row mb-3">
              <label for="password" class="col-sm-3 col-form-label">Password:</label>
              <div class="col-sm-6">
              <input type="password" class="form-control" id="password" name="password" value="">
              <span class="error">* </span>
              <br><br>
              </div>               
            </div>
            <div class="row mb-3">
              <label for="confirm_password" class="col-sm-3 col-form-label">Confirm Password:</label>
              <div class="col-sm-6">
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="">
              <span class="error">* </span>
              <br><br>
              </div>               
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 d-grid">
                    <input type="submit" value="submit" class="btn btn-primary">
                </div>
            </div>
    </form>
</div>
</body>
</html>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
}
  $username = $_POST["username"];
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];
  
  if ($password != $confirm_password) {
    echo "Les mots de passe ne correspondent pas.";
  } else {
    if ($password == "aaaa") {
      header("Location: /MyShop/adminInterface.php");
      exit();
    } else if ($password == "bbbb") {
      header("Location: /MyShop/userInterface.php");
      exit();
    } else {
      echo "Mot de passe incorrect.";
    }
  }
  ?>