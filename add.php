<?php
require('connection.php');
$id_doc = $_GET["id_doc"];
$id_club = $_GET["id_club"];
$name = $_GET["name"];
$breed = $_GET["breed"];
$old = $_GET["old"];
$sex = $_GET["sex"];
$connection = mysqli_connect($host, $user, $password, $db);
$sql = "INSERT INTO member (id_doc, id_club, name, breed, old, sex)
		VALUES ('" . $id_doc . "', '" . $id_club . "', '" . $name . "', '" . $breed . "', '" . $old . "', '" . $sex . "');";
$result = mysqli_query($connection, $sql);
echo("<script>location.href='list.php'</script>");
?>