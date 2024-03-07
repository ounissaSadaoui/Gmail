
<div id="connexion"  aria-labelledby="Connexion">
       <h2>Bienvenue dans votre espace</h2>

       <?php     
            include_once "./controller/connectionControl.inc.php"
       ?>


    <div class="inner-form" role="form" id="Connexion">
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <fieldset>
                <legend>Connectez-vous à votre compte</legend>
                
                <label for="mail">
                    Mail ou Login *
                </label>
                <input 
                    id="mail"
                    type="email"
                    name="mail"
                    placeholder="votreMail@gmail.com" 
                    aria-required="true"
                    >
                
                <label for="motdepasse_">
                    Mot de passe *
                </label>
                <input 
                    id="motdepasse_"
                    type="password"
                    name="motdepasse_"
                    placeholder="Saisissez un mot de passe" 
                    aria-required="true"
                    >

                <input type="submit" value="CONNEXION A VOTRE COMPTE">                       
            </fieldset>
        </form>
    </div>
</div>