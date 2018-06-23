<?php
require('connection.php');
$id_doc = $_GET["id"];
if (is_null($id_doc)) {
    exit;
}
$connect = mysqli_connect($host, $user, $password, $db);
$sql = "DELETE
        FROM member
        WHERE id_doc = '" . $id_doc . "';";
$result = mysqli_query($connect, $sql);
echo("<script>location.href='list.php'</script>");
?>