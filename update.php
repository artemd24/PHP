<?php
require('connection.php');
$id_doc = $_GET["id_doc"];
$id_club = $_GET["id_club"];
$name = $_GET["name"];
$breed = $_GET["breed"];
$old = $_GET["old"];
$sex = $_GET["sex"];
$connection = mysqli_connect($host, $user, $password, $db);
$sql = "UPDATE member
        SET id_doc = '" . $id_doc . "', id_club = '" . $id_club . "', name = '" . $name . "',
        breed = '" . $breed . "', old = '" . $old . "', sex = '" . $sex . "'
        WHERE id_doc=" . $id_doc . ";";
$result = mysqli_query($connection, $sql);
echo("<script>location.href='list.php'</script>");
?>