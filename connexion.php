<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <form action="utilisatur.html" method="post">
                    <div class="form-group">
                        <label for="nom">Adresse e-mail : </label>
                        <input type="mail" 
                            class="form-control" 
                            pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})" 
                            id="email" 
                            name="email" 
                            placeholder="Adresse mail">
                    </div>
                    <div class="form-group">
                        <label for="prenoms">Mot de passe : </label>
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Mot de passe">
                    </div>
                    <button type="submit" class="btn btn-success offset-4" name="envoyer">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php

try {
    $conn = new PDO("sqlsrv:Server=DESKTOP-UJN4SHQ\SQLEXPRESS;Database=RQV", "Dotemin", "Konate001");
}
catch (Exception $e) {
    die("erreur :".$e->getMessage());
}
    $query = $conn->prepare("SELECT * FROM Agent WHERE Email = ?");
    $query->execute([$_POST['email']]);
    $user = $query->fetch();
    if ($user && password_verify($_POST['pass'], $user['pass']))
    {
        echo "Identifiant valid!";
    } else {
        echo "Identifiant invalid!";
    }
?>

