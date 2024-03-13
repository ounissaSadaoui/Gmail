
<div id="connexion"  aria-labelledby="Connexion">
    
    <?php
   if (isset($_SESSION['prenom'])) {
    $prenom = $_SESSION['prenom'];
    ?>

    <h2>Bienvenue dans votre espace, <?php echo htmlspecialchars($prenom); ?>!</h2>

   
    <div class="inner-form" role="form" id="Connexion">
        <?php     
          include_once __DIR__ ."config.inc.php";
        //   include_once __DIR__."/controller/connectionVerif.inc.php";

          
   
        ?>
      <form method="POST" action="<?= $_SERVER["PHP_SELF"]; ?>" id="Connexion">
            <fieldset>
                <legend>Connectez-vous à votre compte</legend> 
                
                <label for="email">
                    Mail ou Login *
                </label>
                <input 
                    id="email"
                    type="email"
                    name="mail"
                    placeholder="VotreMail@gmail.com" 
                    aria-required="true"
                    >
                
                <label for="motdepasse">
                    Mot de passe *
                </label>
                <input 
                    id="motdepasse"
                    type="password"
                    name="motdepasse_"
                    placeholder="Saisissez votre mot de passe" 
                    aria-required="true"
                    >
                <input type="submit" value="CONNEXION A VOTRE COMPTE">       
            </fieldset>
        </form>        
        <?php

            if ((isset($_POST["mail"]) )){
            $mail = $_POST['mail'] ?? '';
             var_dump($mail);

            }
            if ((isset($_POST["motdepasse_"]) )){
            $mdp = $_POST['motdepasse_'] ?? '';
            var_dump($mdp);

            }


     //include_once __DIR__ . "/controller/config.php"; 
     $serveur = "localhost"; // Adresse du serveur MySQL
     $utilisateur = "phpmyadmin"; // Nom d'utilisateur de la base de données
     $motDePasse = "inesjtm"; // Mot de passe de la base de données
     $nomBaseDeDonnees = "users_gmail"; // Nom de la base de données

     if ($_SERVER["REQUEST_METHOD"] == "POST"){

         $mail = $_POST['mail'] ?? '';
         $mdp = $_POST['motdepasse_'] ?? '';

        if (!$mail || !$mdp) {
            die("L'email et le mot de passe sont requis.");
        }

    // Connexion  à la bdd
    try {

        $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motDePasse);
        echo "construit le pdo";


        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete = $connexion->prepare("SELECT motdepasse FROM users WHERE email = ?");
        $requete->execute([$mail]);
        $user = $requete->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($mdp, $user['motdepasse'])) {
        
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
      
    </div>
</div>


    <?php

} else {
        echo "Vous n'avez pas encore de compte !";
}
?>

    

