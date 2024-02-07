<?php

$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), "/\\");

$adminroute = "restrito_admin.php";
$adminroute_new = "restrito_admin_new.php";

define('HOME_URI_ADMIN', "http://$host$uri/$adminroute");
define('HOME_URI_ADMIN_NEW', "http://$host$uri/$adminroute_new");

$alt_img;
$produto_descricao;
$produto_img;
$produto_id;




$connection = mysqli_connect('localhost', 'root', 'luffuspog', 'testeal2022025') or trigger_error(mysqli_error);

if (isset($_POST['delete'])) {
    deleteProduto($_POST['delete']);
}



if (isset($_POST['save']) && isset($_POST['form_product_alt'])) {
    saveProduto($_POST['save']);
}



function deleteProduto($id)
{
    global $connection;
    if (!empty($id)) {
        $produto_id = (int) $id;
        $sql = "DELETE FROM `artigos` WHERE `id_artigo` = '" . $produto_id . "' ";
        $sql1 = "DELETE FROM `destaque` WHERE `id_artigo` = '" . $produto_id . "' ";
        $sql2 = "DELETE FROM `galeria` WHERE `id_artigo` = '" . $produto_id . "' ";
        if ($connection->query($sql) === TRUE && $connection->query($sql1) === TRUE && $connection->query($sql2) === TRUE)
            echo "Record deleted successfully";
        else
            echo "Error deleting record." . $connection->error;

    }
}
function get_produtos_list()
{
    global $connection;
    $sql = "SELECT * FROM artigos ";

    $query = mysqli_query($connection, $sql);

    if (mysqli_num_rows($query) > 0) {

        $res = mysqli_fetch_assoc($query);
        return $query;
    } else {

        exit;
    }
}
function destaqueproduto($destaque)
{
    global $connection;
    $sql = "INSERT IGNORE INTO destaque (id_artigo) VALUES ('$destaque');";


    $query = mysqli_query($connection, $sql);


}

function get_produtos_empresa($id)
{
    global $connection;
    $sql = "SELECT * FROM artigos where id_usuario=$id";

    $query = mysqli_query($connection, $sql);

    if (mysqli_num_rows($query) > 0) {

        $res = mysqli_fetch_assoc($query);
        return $query;
    } else {

        exit;
    }
}
function image($img, $id)
{
    global $connection;
    $sql = "INSERT IGNORE INTO destaque (imgPath, id_artigo) VALUES ('$img','$id');";

    $query = mysqli_query($connection, $sql);

    if (mysqli_num_rows($query) > 0) {

        $res = mysqli_fetch_assoc($query);
        return $query;
    } else {

        exit;
    }
}
function get_users_list()
{
    global $connection;
    $sql = "SELECT * FROM usuario where tipo != 1";

    $query = mysqli_query($connection, $sql);

    if (mysqli_num_rows($query) > 0) {

        $res = mysqli_fetch_assoc($query);
        return $query;
    } else {

        exit;
    }
}
function banir($tipo, $user)
{
    global $connection;
    $sql = "UPDATE usuario SET ativo = '$tipo' WHERE id_usuario = $user ;";


    $query = mysqli_query($connection, $sql);


}
function get_imagens()
{
    global $connection;
    $sql = "SELECT * FROM galeria ";

    $query = mysqli_query($connection, $sql);
    if (mysqli_num_rows($query) > 0) {

        $res = mysqli_fetch_assoc($query);
        return $query;
    } else {

        exit;
    }

}
function get_dono($id)
{
    global $connection;
    $sql = "SELECT usuario.* FROM usuario 
            WHERE usuario.id_usuario = (SELECT id_usuario FROM artigos WHERE id_artigo = $id)";

    $query = mysqli_query($connection, $sql);

    if (mysqli_num_rows($query) > 0) {

        $res = mysqli_fetch_assoc($query);
        return $res;
    } else {

        exit;
    }
}
function get_produtos_detalhe($id)
{
    global $connection;
    $sql = "SELECT * FROM artigos WHERE id_artigo = " . $id;

    $query = mysqli_query($connection, $sql);

    if (mysqli_num_rows($query) > 0) {

        $res = mysqli_fetch_assoc($query);
        return $res;
    } else {

        exit;
    }
}
function get_produtos_pesquisa($nome)
{
    global $connection;
    $sql = "SELECT * FROM artigos WHERE nome like '$nome%' ";

    $query = mysqli_query($connection, $sql);

    if (mysqli_num_rows($query) > 0) {

        $res = mysqli_fetch_assoc($query);
        return $query;
    } else {

        exit;
    }
}
function get_donos_pesquisa($nome)
{
    global $connection;
    $sql = "SELECT * FROM artigos 
    WHERE id_usuario IN (
        SELECT id_usuario FROM usuario 
        WHERE nome LIKE '$nome%'
    );";

    $query = mysqli_query($connection, $sql);

    if (mysqli_num_rows($query) > 0) {

        $res = mysqli_fetch_assoc($query);
        return $query;
    } else {

        exit;
    }
}
function get_destaque()
{
    global $connection;
    $sql = "SELECT * FROM artigos 
    WHERE id_artigo IN (SELECT id_artigo 
   FROM destaque WHERE artigos.id_artigo=destaque.id_artigo);";

    $query = mysqli_query($connection, $sql);

    if (mysqli_num_rows($query) > 0) {

        $res = mysqli_fetch_assoc($query);
        return $query;
    } else {

        exit;
    }
}
function numeroacesso()
{
    $ficheiro = './acesso/acesso.txt';
    $abrir = fopen($ficheiro, "r");
    $total = fread($abrir, filesize($ficheiro));
    fclose($abrir);
    $abrir = fopen($ficheiro, "w");
    $total = $total + 1;
    $guardar = fwrite($abrir, $total);
    fclose($abrir);
}
function contactos($texto)
{
    $ficheiro = './acesso/contactos.txt';
    $abrir = fopen($ficheiro, "w");
    $guardar = fwrite($abrir, " " . $texto);
    fclose($abrir);
}
