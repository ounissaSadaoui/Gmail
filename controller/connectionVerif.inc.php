
<?php
//include_once __DIR__ . "/controller/config.php"; 
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $mail = $_POST['mail'];
    $mdp = $_POST['motdepasse_'];

    if (!$mail || !$mdp) {
     die("L'email et le mot de passe sont requis.");
    }

    // Connexion  à la bdd
    try {
        $pdo = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motDePasse);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete = $pdo->prepare("SELECT motdepasse FROM users WHERE email = ?");
        $requete->execute([$mail]);
        $user = $requete->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($mdp, $user['motdepasse_'])) {
        
            echo "Connexion établie.";

      
        } else {
            echo "Email ou mot de passe incorrect.";
            var_dump($user);

        }
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données"; 
    }
}
    else{
        echo "première conditioj non satisfaite.";

    }

?>
