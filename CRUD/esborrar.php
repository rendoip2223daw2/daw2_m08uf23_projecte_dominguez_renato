<?php
require '../vendor/autoload.php';

use Laminas\Ldap\Ldap;
?>
<!DOCTYPE html>
<html lang="cat">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esborrar Usuari</title>
</head>

<body>
    <header>
        <h2>Esborrar Usuari</h2>
    </header>
    <div>
        <?php
        if ($_POST['method'] == "DELETE") {
            if ($_POST['usr'] && $_POST['ou']) {

                $uid = $_POST['usr'];
                $unorg = $_POST['ou'];
                $dn = 'uid=' . $uid . ',ou=' . $unorg . ',dc=fjeclot,dc=net';

                $opcions = [
                    'host' => 'zend-redoip.fjeclot.net',
                    'username' => 'cn=admin,dc=fjeclot,dc=net',
                    'password' => 'fjeclot',
                    'bindRequiresDn' => true,
                    'accountDomainName' => 'fjeclot.net',
                    'baseDn' => 'dc=fjeclot,dc=net',
                ];

                $ldap = new Ldap($opcions);
                $ldap->bind();
                $isEsborrat = false;
                try {
                    if ($ldap->delete($dn)) echo "<b>Esborrat Correctament</b><br>";
                } catch (Exception $e) {
                    echo "<b>No existeix</b><br>";
                }
            }
        } else {
        ?>
            <div>
                <div>
                    <form action="http://zend-allade.fjeclot.net/projecte/esborrar.php" method="POST" autocomplete="off">
                        <input type="hidden" name="method" value="DELETE" class="noMostrar"><br><br>
                        <input type="text" name="ou" placeholder="Unitat Organitzativa" required /><br><br>
                        <input type="text" name="usr" placeholder="Usuari" required /><br><br>
                        <input type="submit" class="button" value="Esborrar" /><br>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>