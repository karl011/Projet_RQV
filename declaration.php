<?php
	session_start();
	
	try {
		$conn = new PDO("sqlsrv:Server=DESKTOP-UJN4SHQ\SQLEXPRESS;Database=RQV", "Dotemin", "Konate001");
	}
	catch (Exception $e) {
		die("erreur :".$e->getMessage());
	}

	if (isset($_POST["propriete"]) AND 
	isset($_POST["couleur"]) AND 
	isset($_POST["marque"]) AND 
	isset($_POST["matriculeV"]) AND 
	isset($_POST["description"]) AND 
	isset($_POST["lieu"]) AND 
    isset($_POST["villeCommune"]) AND 
    isset($_POST["codePostal"]) AND 
    isset($_POST["numRue"]) AND 
    isset($_POST["dateVol"])) {
		$req = $conn->prepare("INSERT INTO Declaration(Propriete,Couleur,Marque,MatriculeV,DescriptioG,Lieu,VilleCommune,CodePostal,NumRue,DateVol,IDUtilisateur) VALUES(?,?,?,?,?,?,?,?,?,?,?)" );
				$req->execute(array(
					$_POST["propriete"], 
					$_POST["couleur"], 
					$_POST["marque"], 
					$_POST["matriculeV"], 
					$_POST["description"],
					$_POST["lieu"],
                    $_POST["villeCommune"],
                    $_POST["codePostal"],
                    $_POST["numRue"],
                    $_POST["dateVol"],
					$_SESSION['id']));
				
		include_once("index.html");
	}
?>