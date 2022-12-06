<?php
include './includes/connect.php';
include './includes/header.php';


if (!empty($_POST)){
    //verification que TOUS LES CHAMP sont plein et existent
    if(isset($_POST['login'], $_POST['prenom'], $_POST['nom'], $_POST['pass'], $_POST['confpass']) && !empty($_POST['login']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['pass']) && !empty($_POST['confpass'])){
        // le formulaire est bien rempli
        // recupération des données 
        $login  = ($_POST['login']);
        $prenom = ($_POST['prenom']);
        $nom    = ($_POST['nom']);
        $pass   = ($_POST['pass']);
        $confpass = ($_POST['confpass']);
        // verification si le login est deja présent dans la BDD
        $check = mysqli_num_rows($mysqli->query("SELECT * FROM utilisateurs WHERE login='$login'"));
        // verification si le mdp et confirmation du mdp
        if ($pass != $confpass){
            echo "<p>les mots de passe ne correspondent pas</p>";
        } elseif ($check==1){
            echo "<p>Le login existe déjà</p>";
        } else{
            $new_user = "INSERT INTO utilisateurs (login, prenom, nom, password) VALUES ('$login', '$prenom', '$nom', '$pass')";
            $mysqli->query($new_user) === true;
            header("Location: connexion.php");
            
        }  
    }
}

?>
<h2>Inscription</h2>
<main>
    <div class="container-form">
        <form action="" method="post" >
            <div class="formulaire">
                <input type="text" name="login" placeholder="Entrez votre login:">
            </div>
            
            <div class="formulaire">
                <input type="text" name="prenom" placeholder="Entrez votre prénom:">
            </div>

            <div class="formulaire">
                <input type="text" name="nom" placeholder="Entrez votre nom:">
            </div>

            <div class="formulaire">
                <input type="password" name="pass" placeholder="Entrez votre mot de passe:">
            </div>

            <div class="formulaire">
                <input type="password" name="confpass" placeholder="Confirmez votre mot de passe:">
            </div>

            <div class="formulaire">
                <input type="submit" name="inscription" value="S'incrire">
            </div>
        </form>
    </div>
</main>
<?php include "./includes/footer.php"; ?>