<?php
require '../vendor/autoload.php';
use Laminas\Ldap\Ldap;
$domini = 'dc=fjeclot,dc=net';
$opcions = [
    'host' => 'zend-redoip.fjeclot.net',
    'username' => "cn=admin,$domini",
    'password' => 'fjeclot',
    'bindRequiresDn' => true,
    'accountDomainName' => 'fjeclot.net',
    'baseDn' => 'dc=fjeclot,dc=net'
];
$ldap = new Ldap($opcions);
$ldap->bind();
$id = $_POST["id"];
$tipusUser = $_POST["tipusUser"];
$usuari = $ldap->getEntry('uid='.$id.','.$tipusUser.',dc=fjeclot,dc=net');
echo "<b><u>" . $usuari["dn"] . "</b></u><br>";
foreach ($usuari as $atribut => $dada) {
    if ($atribut != "dn")
        echo $atribut . ": " . $dada[0] . '<br>';
}
