<?php
require '../vendor/autoload.php';

use Laminas\Ldap\Attribute;
use Laminas\Ldap\Ldap;
?>
    <!DOCTYPE html>
    <html lang="cat">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modificar Usuari</title>
        <style>
        /* Estilos para el encabezado */
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        /* Estilos para el enlace "Inici" */
        header a {
            color: #fff;
            text-decoration: none;
        }

        /* Estilos para el título */
        header h2 {
            margin-top: 0;
        }

        /* Estilos para el formulario */
        form {
            margin: 20px auto;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        /* Estilos para las etiquetas de radio */
        .formLabel {
            margin-left: 10px;
        }

        /* Estilos para el botón "Modificar" */
        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 10px;
        }

        /* Estilos para la entrada oculta */
        .noMostrar {
            display: none;
        }
    </style>
</head>
    
    <body>
    <header>
		<a href="http://zend-redoip.fjeclot.net/projecte/menu.html"> Inici </a><br>
		<h2>Modificar Usuari</h2>
    </header>
        <div>
            <?php
            if ($_POST['method'] == "PUT") {
                if ($_POST['uid'] && $_POST['ou'] && $_POST['radioValue'] && $_POST['nouContingut']) {

                    $atribut = $_POST['radioValue'];
                    $nou_contingut = $_POST['nouContingut'];

                    $uid = $_POST['uid'];
                    $ou = $_POST['ou'];
                    $dn = 'uid=' . $uid . ',ou=' . $ou . ',dc=fjeclot,dc=net';

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
                    $entrada = $ldap->getEntry($dn);
                    if ($entrada) {
                        Attribute::setAttribute($entrada, $atribut, $nou_contingut);
                        $isModificat = true;
                        $ldap->update($dn, $entrada);
                        echo "Modificat correctament<br />";
                    } else {
                        echo "<b>No existeix</b><br />";
                    }
                }
            } else {
            ?>
                <div>
                    <div>
                        <form action="http://zend-redoip.fjeclot.net/projecte/CRUD/modificar.php" method="POST" autocomplete="off">
                        <br><input type="hidden" name="method" value="PUT" class="noMostrar"><br>
                            Unitat organitzativa: <input type="text" name="ou" placeholder="Unitat Organitzativa" required /><br><br>
                            Usuari: <input type="text" name="uid" placeholder="Usuari" required /> <br><br>
                            <input type="radio" name="radioValue" value="uidNumber" /><span class="formLabel">UID Number</span><br>
                            <input type="radio" name="radioValue" value="gidNumber" /><span class="formLabel">GID Number</span><br>
                            <input type="radio" name="radioValue" value="homeDirectory" /><span class="formLabel">Directori Personal</span><br>
                            <input type="radio" name="radioValue" value="loginShell" /><span class="formLabel">Shell</span><br>
                            <input type="radio" name="radioValue" value="cn" /><span class="formLabel">CN</span><br>
                            <input type="radio" name="radioValue" value="sn" /><span class="formLabel">SN</span><br>
                            <input type="radio" name="radioValue" value="givenName" /><span class="formLabel">Given Name</span><br>
                            <input type="radio" name="radioValue" value="postalAddress" /><span class="formLabel">Adreça Postal</span><br>
                            <input type="radio" name="radioValue" value="mobile" /><span class="formLabel">Mòbil</span><br>
                            <input type="radio" name="radioValue" value="telephoneNumber" /><span class="formLabel">Telèfon Fixe</span><br>
                            <input type="radio" name="radioValue" value="title" /><span class="formLabel">Títol</span><br>
                            <input type="radio" name="radioValue" value="description" /><span class="formLabel">Descripció</span><br><br>
                            <input type="text" name="nouContingut" placeholder="Contigut a modificar" required /><br><br>
                            <input type="submit" class="button" value="Modificar"/><br>
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </body>

    </html>
<?php