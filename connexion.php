<?php    
  include_once "./controller/head.inc.php";
  require_once __DIR__ . "/controller/controller_base.class.php";
  ControllerBase::event();
?>
    <header>
        <nav class="navbar" role="navigation">
            <a id="logo_g" href="index.php"> <img src="./asset/mail.png" alt="logo gmail">Gmail</a>
            <a id="btn_pros" href="#pros">Pour les Pros</a>
            <a id="btn_connexion" href="connexion.php" target="_blank">Connexion</a>
            <a id="btn_creation" href="index.php">Créer un compte</a>
        </nav>
    </header>   
    
    <section id="connexion"  aria-label="Connexion">
       <h2>Bienvenue dans votre espace <?php print ControllerBase::event().$_name ?></h2>
    <div class="inner-form" role="form" aria-labelledby="connexion">
        <form action="index.php" method="post">
            <fieldset>
                <legend>Connectez-vous à votre compte</legend>
                
                <label for="login-mail">
                    Mail ou Login *
                </label>
                <input 
                    id="login-mail"
                    type="email"
                    name="email"
                    placeholder="votreMail@gmail.com" 
                    aria-required="true"
                    >
                
                <label for="login-motdepasse">
                    Mot de passe *
                </label>
                <input 
                    id="login-motdepasse"
                    type="password"
                    name="motdepasse"
                    placeholder="Saisissez un mot de passe" 
                    aria-required="true"
                    >

                <input type="submit" value="CONNEXION A VOTRE COMPTE">                       
            </fieldset>
        </form>
    </div>
</section>
</html>
