<?php
session_start();
include "./includes/connect.php";
include "./includes/header.php";

$sqli = $mysqli->query("SELECT * FROM `utilisateurs`");
$admin = $sqli->fetch_all();


?>
<table border="1px">
    <thead>
        <td>id</td>
        <td>login</td>
        <td>Prénom</td>
        <td>Nom</td>
        <td>password</td>
    </thead>
    <tbody>
        <?php 
            foreach ($admin as $ligne) {
                echo "<tr>";
                foreach ($ligne as $value){
                    echo "<td>". $value . "</td>";
                }
                echo "</tr>";
            }

        ?>
        </tbody>


<?php
include "./includes/footer.php"
?>