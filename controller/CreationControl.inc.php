<?php
    include_once __DIR__."/connecton.php";
    $serveur = "localhost"; 
    $dbname = "users_gmail"; 
    $dbtable = "users"; 
    $user = "phpmyadmin"; 
    $password = "inesjtm";

    $prenom = valid_donnees($_POST["prenom"]);
    $nom = valid_donnees($_POST["nom"]);
    $email = valid_donnees($_POST["email"]);
    $password = password_hash($_POST['motdepasse'],PASSWORD_DEFAULT);

    function valid_donnees($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }

    if (!empty($prenom)&& !empty($email)
        && filter_var($email, FILTER_VALIDATE_EMAIL)){

        try{
            // Connexion à la BDD
            $dbco = new PDO("mysql:host=$serveur", $user, $password);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Création de la base de données si elle n'existe pas
            $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
            $dbco->exec($sql);
            echo "Base de données créée avec succès. ";

            // Sélection de la base de données
            $dbco->exec("USE $dbname");

            // Création de la table si elle n'existe pas
            $requete = "CREATE TABLE IF NOT EXISTS $dbtable (
                        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
                        nom VARCHAR( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                        prenom VARCHAR( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                        email VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                        password VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
                        ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;";
            $dbco->prepare($requete)->execute();

            // Insertion des données
            $sth = $dbco->prepare("
                INSERT INTO $dbtable (nom, prenom, email, motdepasse)
                VALUES(:nom, :prenom, :email$email, :motdepasse)");
            $sth->bindParam(':nom',$nom);
            $sth->bindParam(':prenom',$prenom);
            $sth->bindParam(':email$email',$email);
            $sth->bindParam(':motdepasse',$password);
            $sth->execute();

            // Redirection vers connexion.php
            header("Location: connection.php");
            exit();

        } catch(PDOException $e){
            echo 'Erreur : '.$e->getMessage();
        }
    } else {
        // Gérer les erreurs de validation ici, par exemple :
        echo "Erreur de validation. Veuillez vérifier vos données.";
    }
    ?>