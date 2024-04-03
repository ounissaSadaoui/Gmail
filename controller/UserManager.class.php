<?php


class UserManager {

    static function insertUser() {
        require_once('config.php'); # ceci est le fichier de configuration de la base de données, il faut oujours l'inclure 

        try {
            // le PDO est ce qui permet une connexion à la bdd, grâce aux infos récupérées dans config.php
            $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motDePasse);
        
            // Afficher les erreurs PDO
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            // Vérifier si le formulaire a été soumis
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                // Récupérer le login et le mot de passe du formulaire
                $nom = $_POST["Nom"];
				$prenom = $_POST["prenom"];
                $login = $_POST["email"];
                $motDePasse = $_POST["motdepasse"];
        
                // Vérifier si l'utilisateur existe déjà dans la base de données
                $_requete_Verif = $connexion->prepare("SELECT id FROM users WHERE email = ?");
                $_requete_Verif->bindParam(1, $login);
                $_requete_Verif->execute();
        
                if ($_requete_Verif->rowCount() > 0) {
                    // L'utilisateur existe déjà, afficher un message d'erreur
                    print '<p class="warning msg-alert">Un compte existe déjà avec cette adresse, veuillez en choisir une autre.</p>';
                } 
                else 
                {
                    // L'utilisateur n'existe pas, procéder à l'insertion
                    if (!empty($login) && !empty($motDePasse) && !empty($nom)&& !empty($prenom) && filter_var($login, FILTER_VALIDATE_EMAIL)) {
                        $motDePasseHash = password_hash($motDePasse, PASSWORD_DEFAULT);
            
                        // Préparer la requête SQL pour insérer les données dans la base de données
                        $requete = $connexion->prepare("INSERT INTO users (nom, prenom, email, motDePasse) VALUES (?, ?, ?, ?)");
                
                        // Binder les paramètres
                        $requete->bindParam(1, $nom); 
                        $requete->bindParam(2, $prenom);
                        $requete->bindParam(3, $login);
                        $requete->bindParam(4, $motDePasseHash);

                       
                    
                        // Exécuter la requête
                        $requete->execute();
                        $_SESSION['prenom'] = $prenom;
                            
                        // Rediriger vers connecton.php
                        header('Location: ./connection.php');
                        exit; // Assure-toi d'appeler exit après une redirection pour arrêter l'exécution du script

                     //   if ($requete->execute()) {
                            // Démarrer ou continuer la session
                         //   session_start();
                          //ici on récupère le prenom, c'est ça qu'on veut afficher à la page
                          
                      //  }
                    
                        print '<p class="warning msg-success">'.$login.' : Enregistrement réussi !</p>';
        
                    } else {
                        print '<p class="warning msg-alert">Tous les champs sont obligatoires ou mail invalide</p>';
                    }
                }
        
                // Fermer la connexion
                $connexion = null;
            }
        } catch (PDOException $e) {
            echo '<p class="warning msg-alert">Erreur de connexion à la base de données : </p>' . $e->getMessage();
        }
    }
}

// Utilisation
UserManager::insertUser();
?>
