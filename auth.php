<?php
require 'vendor/autoload.php';

use Laminas\Ldap\Ldap;

ini_set('display_errors', 0);
if ($_POST['contrasenya'] && $_POST['usuari']) {
    $opcions = [
        'host' => 'zend-redoip.fjeclot.net',
        'username' => "cn=admin,dc=fjeclot,dc=net",
        'password' => 'fjeclot',
        'bindRequiresDn' => true,
        'accountDomainName' => 'fjeclot.net',
        'baseDn' => 'dc=fjeclot,dc=net',
    ];
    $ldap = new Ldap($opcions);
    $dn = 'cn=' . $_POST['usuari'] . ',dc=fjeclot,dc=net';
    $ctsnya = $_POST['contrasenya'];
    try {
        $ldap->bind($dn, $ctsnya);
        header("location: menu.html");
    } catch (Exception $e) {
        echo "<b>Contrasenya incorrecta</b><br><br>";
    }
}
?>
<html>

<head>
    <title>
        AUTENTICACIÓ AMB LDAP
    </title>
</head>

<body>
    <a href="http://zend-redoip.fjeclot.net/projecte/index.html">Torna a la pàgina inicial</a>
</body>

</html>