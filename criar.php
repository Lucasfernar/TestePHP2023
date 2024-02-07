<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/css.css">
    <title>Hello, world!</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f2f2f2;
        }

        .login-box {
            background-color: #fff;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            width: 300px;
            padding: 20px;
            text-align: center;
        }

        .login-box input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <div class="login-box">
        <h2>Criar conta</h2>
        <form action="criarsistema.php" method="post">
            <fieldset>
                <input type="text" name="user" maxlength="25" id="txtUser" placeholder="Nome">
                <input type="number" name="idade" maxlength="2" id="txtUser" placeholder="Idade">
                <input type="password" name="password" maxlength="25" id="txtPassword" placeholder="Password">
                <select name="tipo">
                    <option value="2">Comprador</option>
                    <option value="3">Empresa</option>
                </select>
                <input type="submit" value="Entrar">
                <a href="login.php">Login</a>
                <a href="index.php">Voltar</a>
            </fieldset>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</html>