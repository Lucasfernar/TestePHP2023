<?php
if (!empty($_POST) and (empty($_POST['user']) or empty($_POST['password']))) {
    header("Location: index.php");
    exit;
}
$connection = mysqli_connect('localhost', 'root', '', 'testeal2022025') or trigger_error(mysqli_error);
$user = mysqli_real_escape_string($connection, $_POST['user']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

$passhash = sha1($password);

$sql = "SELECT * FROM `usuario` WHERE (`nome`='" . $user . "') AND (`palavra_passe`='" . $passhash . "') AND (`ativo`=1) LIMIT 1";
$query = mysqli_query($connection, $sql);

if (mysqli_num_rows($query) != 1) {
    echo "Login inválido.";
    header("Location: index.php");
    exit;
} else {
    $resultado = mysqli_fetch_assoc($query);

    if (!isset($_SESSION))
        session_start();
    $_SESSION['UserID'] = $resultado['id_usuario'];
    $_SESSION['UserNome'] = $resultado['nome'];
    $_SESSION['UserNivel'] = $resultado['tipo'];
    $_SESSION['UserEmail'] = $resultado['email'];



    switch ($_SESSION['UserNivel']) {
        case 1:
            header("Location: restrito_admin.php");
            break;
        case 2:
            header("Location: restrito_empresa.php?id=" . $resultado['id_usuario']);

            break;
        case 3:
            header("Location: restrito_user.php?id=" . $resultado['id_usuario']);
            break;
        default:
            echo "Para de me chatear";
    }
}


?>