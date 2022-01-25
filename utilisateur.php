<?php
	session_start();
	try {
		$conn = new PDO("sqlsrv:Server=DESKTOP-UJN4SHQ\SQLEXPRESS;Database=RQV", "Dotemin", "Konate001");
	}
	catch (Exception $e) {
		die("erreur :".$e->getMessage());
	}
	if (isset($_POST["civilite"]) AND 
	isset($_POST["nom"]) AND 
	isset($_POST["prenoms"]) AND 
	isset($_POST["roleUtilisateur"]) AND 
	isset($_POST["numCNI"]) AND 
	isset($_POST["numTel"]) AND 
	isset($_POST["adresse"])) {
		$req = $conn->prepare("INSERT INTO Utilisateur(Civilite,Nom,Prenoms,RoleUtilisateur,NumCNI, Telephone,Adresse) VALUES(?,?,?,?,?,?,?)" );
				$req->execute(array(
					$_POST["civilite"], 
					$_POST["nom"], 
					$_POST["prenoms"], 
					$_POST["roleUtilisateur"], 
					$_POST["numCNI"],
					$_POST["numTel"], 
					$_POST["adresse"]));
					$_SESSION['id']= $conn->lastInsertId();
		include_once("declaration.html");
	}
?>
