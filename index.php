<?php
include_once "./controller/head.inc.php"

?>
<body>
    <header>
        <nav class="navbar" role="navigation">
            <a id="logo_g" href="#home_page"> <img src="./asset/mail.png" alt="logo gmail">Gmail</a>
            <a id="btn_pros" href="#pros">Pour les Pros</a>
            <a id="btn_connexion" href="connexion.html" target="_blank">Connexion</a>
            <a id="btn_creation" href="#create">Créer un compte</a>
        </nav>
    </header>   

    <main>
        <section id="home_page" role="region" aria-label="Introduction">
            <p>Retrouvez la fluidité et la simplicité de Gmail sur tous vos appareils</p>
                <a id="create_button" href="#create"> Créer un compte</a>
            <div id="arrow">
                <a href="#create"><img src="./asset/arrow.png" alt="scroll down"></a>
            </div>
        </section>
        <?php
        
        require_once __DIR__ . "/controller/controller_base.class.php";
        ControlloerBase::event();
        ?>


        <section id="create" role="region" aria-label="Création de compte">
            <h2>Une boîte de réception entièrement repensée</h2>
            <p>Avec les nouveaux onglets personnalisables, repérez immédiatement les nouveaux messages et choisissez ceux que vous souhaitez lire en priorité</p>

            <div class="form-creation" role="form" aria-labelledby="inscription">
                <form action="index.php" method="post">
                    <fieldset>
                        <legend>Créer un compte</legend>
                        
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
                    </fieldset>
                </form>
            </div>
        </section>      
    </main>
</body>
</html>