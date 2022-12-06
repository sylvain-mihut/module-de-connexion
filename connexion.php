<?php
    include './includes/connect.php';
    include './includes/header.php';

    if (!empty($_POST)){
        if (isset($_POST['login'], $_POST['pass']) && !empty($_POST['login']) && !empty($_POST['pass'])){
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            
            // requette sql afin de comparer le login a la BDD
            $sqli = $mysqli->query("SELECT * FROM `utilisateurs` WHERE `login`='$login'");
            $user = $sqli->fetch_assoc();
            // var_dump($user);die;
            // $check = mysqli_num_rows($sqli);

            // virification si l'utilisateur existe
            if (!$user){
                echo "<p>Le login et ou le mot de passe n'existe pas</p>";
            }
            // si l'utilisateur existe on vérifie le pass
            elseif ($user['password']==$pass){
                session_start();
                var_dump($user);
                $_SESSION['utilisateur'] = $user['login'];
                $_SESSION['prenom'] = $user['prenom'];
                $_SESSION['nom'] = $user['nom'];
                $_SESSION['pass'] = $user['password'];


                header('Location: index.php?session=true');
            }
            else {
                echo "<p>Le login et ou le mot de passe n'existe pas</p>";
            }       
        }  
    }

?>
<h2>Connexion</h2>
<main>
    <div class="container-form">
        <form action="" method="post" >
            <div class="formulaire">
                <input type="text" name="login" placeholder="Entrez votre login:">
            </div>

            <div class="formulaire">
                <input type="password" name="pass" placeholder="Entrez votre mot de passe:">
            </div>

            <div class="formulaire">
                <input class="btn" type="submit" name="connexion" value="se connecter">
            </div>
        </form>
    </div>
</main>
<?php include "./includes/footer.php";