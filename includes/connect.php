<?php
$BDD = array();
$BDD['host'] = "sylvain-mihut_module_de_connexion";
// $BDD['host'] = "localhost";
$BDD['user'] = "sylvain-mihut";
$BDD['pass'] = "Mdpprojetplesk";
$BDD['db'] = "module_de_connexion";
$mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
if(!$mysqli) {
    echo "Connexion non établie.";
    exit;
}
?>