<?php

require '../vendor/autoload.php';

use Laminas\Ldap\Attribute;
use Laminas\Ldap\Ldap;

ini_set('display_errors', 0);
#Dades de la nova entrada
#
$uid = $_POST['uid'];
$unorg = $_POST['uOrganitzativa'];
$num_id = $_POST['uidNumber'];
$grup = $_POST['gidNumber'];
$dir_pers = $_POST['DPersonal'];
$sh = $_POST['Shell'];
$cn = $_POST['cn'];
$sn = $_POST['sn'];
$nom = $_POST['givenName'];
$mobil = $_POST['mobile'];
$adressa = $_POST['PostalAdress'];
$telefon = $_POST['telephoneNumber'];
$titol = $_POST['title'];
$descripcio = $_POST['description'];
$objcl = array('inetOrgPerson', 'organizationalPerson', 'person', 'posixAccount', 'shadowAccount', 'top');
#
#Afegint la nova entrada
$domini = 'dc=fjeclot,dc=net';
$opcions = [
    'host' => 'zend-redoip.fjeclot.net',
    'username' => "cn=admin,$domini",
    'password' => 'fjeclot',
    'bindRequiresDn' => true,
    'accountDomainName' => 'fjeclot.net',
    'baseDn' => 'dc=fjeclot,dc=net',
];
$ldap = new Ldap($opcions);
$ldap->bind();
$nova_entrada = [];
Attribute::setAttribute($nova_entrada, 'objectClass', $objcl);
Attribute::setAttribute($nova_entrada, 'uid', $uid);
Attribute::setAttribute($nova_entrada, 'uidNumber', $num_id);
Attribute::setAttribute($nova_entrada, 'gidNumber', $grup);
Attribute::setAttribute($nova_entrada, 'homeDirectory', $dir_pers);
Attribute::setAttribute($nova_entrada, 'loginShell', $sh);
Attribute::setAttribute($nova_entrada, 'cn', $cn);
Attribute::setAttribute($nova_entrada, 'sn', $sn);
Attribute::setAttribute($nova_entrada, 'givenName', $nom);
Attribute::setAttribute($nova_entrada, 'mobile', $mobil);
Attribute::setAttribute($nova_entrada, 'postalAddress', $adressa);
Attribute::setAttribute($nova_entrada, 'telephoneNumber', $telefon);
Attribute::setAttribute($nova_entrada, 'title', $titol);
Attribute::setAttribute($nova_entrada, 'description', $descripcio);
$dn = 'uid=' . $uid . ',ou=' . $unorg . ',dc=fjeclot,dc=net';
if ($ldap->add($dn, $nova_entrada)) echo "Usuari creat";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>