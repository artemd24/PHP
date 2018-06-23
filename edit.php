<html>
<body>

<?php
require('connection.php');
$id_doc = $_GET["id"];
if (is_null($id_doc)) {
    exit;
}
$connection = mysqli_connect($host, $user, $password, $db);
$result = mysqli_query($connection, "SELECT DISTINCT id_doc, id_club, name, breed, old, sex FROM member WHERE id_doc = '" . $id_doc . "';");
$member = mysqli_fetch_assoc($result);
?>

<form action="dbupdate.php" method="get">
	<input type="hidden" name="id_doc" value=<?php echo $member['id_doc']; ?>><br>
    id_club:
    <input type="text" name="id_club" value=<?php echo $member['id_club']; ?>><br>
    name:
    <input type="text" name="name" value=<?php echo $member['name']; ?>><br>
    breed:
    <input type="text" name="breed" value=<?php echo $member['breed']; ?>><br>
    old:
    <input type="text" name="old" value=<?php echo $member['old']; ?>><br>
    sex:
    <input type="text" name="sex" value=<?php echo $member['sex']; ?>><br>
    <input type="submit">
</form>

</body>
</html>