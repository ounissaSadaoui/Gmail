<?php
session_start();

$serveur = "localhost";
$dbname = "users_gmail";
$dbtable = "users";
$user = "phpmyadmin";
$pass = "inesjtm";

try {
  // Connexion à la base de données
  $connexion = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass);
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = stripslashes($_POST["mail"]);
    $password = $_POST['motdepasse_'];

    $requete_Verif = $connexion->prepare("SELECT prenom, motdepasse FROM $dbtable WHERE email = ?");
    $requete_Verif->bindParam(1, $mail);
    $requete_Verif->execute();

    $row = $requete_Verif->fetch(PDO::FETCH_ASSOC);
    $prenom = $row['prenom'];
    $hash = $row['motdepasse_'];

    if ($requete_Verif->rowCount() > 0 && password_verify($password, $hash)) {
        $_SESSION['prenom'] = $prenom;

        echo '<h2>Bienvenue dans votre espace ' . $_SESSION['prenom'] . ' !</h2>';
        exit();
        
    } else {
      print '<p class="error msg-alert"> Login ou mot de passe érroné </p>';
    }
  } else {
    echo "Erreur, veuillez réessayer";
  }
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>