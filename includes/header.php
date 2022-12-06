<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Projet module de connexion</title>
</head>
<body>
    <header>
    <h1>Module de connexion</h1>
        <?php
            if (isset($_GET['deconnexion'])){
                if($_GET['deconnexion']==true){
                    session_unset();
                    header('Location: index.php');
                }
            }
            if (isset($_SESSION['utilisateur'])){
                session_start();
                if ($_SESSION['utilisateur'] == 'admin'){
                    echo "<nav>
                    <a href='index.php'><button>accueil</button></a>
                    <a href='admin.php'><button>Admin</button></a>
                    <a href='index.php?deconnexion=true'><button>Déconnexion</button></a>
                    </nav>";
                } else {
                    // session_start();
                    echo "Bonjour : ".$_SESSION['utilisateur']."<br>";
                    echo "<nav>
                    <a href='index.php'><button>accueil</button></a>
                    <a href='profil.php'><button>profil</button></a>
                    <a href='index.php?deconnexion=true'><button>Déconnexion</button></a>
                    </nav>";
                }
            } else {
                echo "<nav>
                <a href='index.php'><button>accueil</button></a>
                <a href='inscription.php'><button>inscription</button></a>
                <a href='connexion.php'><button>connexion</button></a>
                </nav>";
            }

        ?>
            <!-- <nav>
            <a href="index.php">accueil</a>
            <a href="inscription.php">inscription</a>
            <a href="connexion.php">connexion</a>
        </nav> -->
    </header>

