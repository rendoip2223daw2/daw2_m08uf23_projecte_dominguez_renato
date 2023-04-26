<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LDAP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* Estilos para el formulario */
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #CCC;
            border-radius: 5px;
            background-color: #FFF;
            box-shadow: 0px 2px 5px rgba(0,0,0,0.3);
        }

        /* Estilos para las etiquetas de los campos */
        label {
            display: block;
            margin-bottom: 5px;
        }

        /* Estilos para los campos del formulario */
        input {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #CCC;
            border-radius: 5px;
            font-size: 16px;
            line-height: 1.4;
            box-sizing: border-box;
        }

        /* Estilos para el botón de envío */
        button[type="submit"] {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #FFF;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            line-height: 1.4;
            cursor: pointer;
        }

        /* Estilos para el botón de envío al pasar el mouse sobre él */
        button[type="submit"]:hover {
            background-color: #0069d9;
        }
    </style>
</head>

<body>
    <form action="http://zend-redoip.fjeclot.net/projecte/auth.php" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Usuari</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email" name="usuari">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="contrasenya">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
