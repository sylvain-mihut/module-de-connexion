<?php
session_start();
include "./includes/header.php";
include "./includes/connect.php";
// var_dump($_SESSION);
$login = $_SESSION['utilisateur'];
$prenom = $_SESSION['prenom'];
$nom = $_SESSION['nom'];
$pass = $_SESSION['pass'];


?>
<h2>Modification du profil</h2>
<br>
<main>
    <div class="container-form">
        <form action="" method="post">
            <div class="formulaire">
                <label for="login">Modification du login</label>
                <input type="text" name="login" value="<?=$login?>" required>
            </div>

            <div class="formulaire">
                <label for="prenom">Modification du prénom</label>
                <input type="text" name="prenom" value="<?=$prenom?>" required>
            </div>

            <div class="formulaire">
                <label for="nom">Modification du nom</label>
                <input type="text" name="nom" value="<?=$nom?>" required>
            </div>

            <div class="formulaire">
                <input type="password" name="pass" placeholder="Entrez votre mot de pass" required>
            </div>

            <div class="formulaire">
                <input type="submit" value="Modifier">
            </div>  
        </form>
    </div>
</main>
<?php
if (!empty($_POST)){
    //verification que TOUS LES CHAMP sont plein et existent
    if(isset($_POST['login'], $_POST['prenom'], $_POST['nom'], $_POST['pass']) && !empty($_POST['login']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['pass'])){
        // verification du mot de passe
       if (($_POST['pass'] == $pass)){
        // initialisation de la requette
        $sql = "UPDATE utilisateurs SET login = '{$_POST['login']}', prenom = '{$_POST['prenom']}', nom = '{$_POST['nom']}' WHERE login = '$login'";
        $mysqli->query($sql);
            echo "<br>";
            echo "<p>information modifier</p>";

            $_SESSION['utilisateur'] = $_POST['login'];
            $_SESSION['prenom'] = $_POST['prenom'];
            $_SESSION['nom'] = $_POST['nom'];
            $_SESSION['pass'] = $_POST['pass'];
       }
    }
}

?>

<?php
include "./includes/footer.php"
?>