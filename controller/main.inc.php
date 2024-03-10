
<?php
session_start();
?>
    <main>
        <div id="home_page" role="region" aria-labelledby="Introduction">
            <p id="Introduction">Retrouvez la fluidité et la simplicité de Gmail sur tous vos appareils</p>
                <a id="create_button" href="#create"> Créer un compte</a>
            <div id="arrow">
                <a href="#create"><img src="./asset/arrow.png" alt="scroll down"></a>
            </div>
        </div>

        <div id="create" role="region" aria-labelledby ="Création de compte">
            <h2>Une boîte de réception entièrement repensée</h2>
            <p>Avec les nouveaux onglets personnalisables, repérez immédiatement les nouveaux messages et choisissez ceux que vous souhaitez lire en priorité</p>

            <div class="form-creation" role="form" aria-labelledby="inscription">
                <?php
                      include_once __DIR__."/controller/UserManager.class.php";
                 ?>
                    <fieldset>
                        <legend>Créer un compte</legend>
                        <form method="post" action="<?= $_SERVER["PHP_SELF"]; ?>" id="inscription">


                        <label for="nom">
                            Nom *
                        </label>
                        <input 
                            id="nom"
                            type="text"
                            name="Nom"
                            placeholder="Votre nom" 
                            aria-required="true"
                            >
                        
                        <label for="prenom">
                            Prénom *
                        </label>
                        <input 
                            id="prenom"
                            type="text"
                            name="prenom"
                            placeholder="Votre prénom" 
                            aria-required="true"
                            >
                        
                        <label for="email">
                            Mail *
                        </label>
                        <input 
                            id="email"
                            type="email"
                            name="email"
                            placeholder="Saisissez votre Mail" 
                            aria-required="true"
                            >
                        
                        <label for="motdepasse">
                            Mot de passe *
                        </label>
                        <input 
                            id="motdepasse"
                            type="password"
                            name="motdepasse"
                            placeholder="Saisissez un mot de passe" 
                            aria-required="true"
                            >
                        
                        <input type="submit" value="VALIDER VOTRE COMPTE">   
                     </form>
                </fieldset>
            </div>
        </div>      
    </main>