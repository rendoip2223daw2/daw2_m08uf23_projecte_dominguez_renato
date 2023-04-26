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
    <style>
        <style>
        /* Estilos CSS personalizados */
        body {
            background-color: lightblue;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: navy;
            color: white;
            padding: 20px;
            text-align: center;
        }

        input[type="text"] {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 5px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        .button {
            background-color: navy;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #001f4d;
        }

        .noMostrar {
            display: none;
        }

        /* Nuevos estilos CSS */
        header h2 {
            font-size: 28px;
        }

        input[type="text"] {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <header>
        <h2>Esborrar Usuari</h2>
    </header>
    <div>
        <?php
        if (isset($_POST['method']) && $_POST['method'] == "DELETE") {
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
                    <form action="http://zend-redoip.fjeclot.net/projecte/CRUD/esborrar.php" method="POST" autocomplete="off">
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