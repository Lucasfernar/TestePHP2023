<?php
include_once './database.php';
numeroacesso();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/css.css">
    <title>Hello, world!</title>
</head>

<body>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" alt="" width="60" height="64">
            </a>
            <form class="d-flex">
                <a href="contactos.php">
                    <button type="submit">Contactos</button>
                </a>
                <a href="login.php"><img src="img/user.png" alt="user" width="60" style="margin-left: 20px;"></a>
            </form>
        </div>
    </nav>
    <div class="container">
        <h2 style="margin-top:20px">Contactos</h2>
        <div class="row">
            <p>Telemovel: 962418080</p>
            <p>Email:al2022025@epcc.pt</p>
            <p>Morada:Canico</p>
            <p>Cod-postal:9000</p>
        </div>

        <h2>Enviar contactos</h2>
        <form method="post" action="" id="pesquisa" name="pesquisa">
            <textarea id="mensagem" name="contacto" rows="4" cols="50" id="txtUser"
                placeholder="Seu contacto"></textarea>
            <input type="submit" value="submit" name="submit">
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $texto = $_POST['contacto'];
        contactos($texto);
    }

    ?>

    <footer>

        <div><b>Copyright Lucas &copy;Fernandes</b></div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</html>