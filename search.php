<?php
require_once 'connection.php';
$name = strtr($_GET['name'], '*', '%');
$host_name = strtr($_GET['host_name'], '*', '%');
$connection = mysqli_connect($host, $user, $password, $db);
echo "<form method='GET' action='search.php'>
<p>Введите имя участника: <input type='text' name='name' value='$name'></p>
<p>Введите имя хозяина участника: <input type='text' name='host_name' value='$host_name'></p>
<p><input type='submit' name='enter' value='Поиск'></p>
</form>";
if (isset($_GET['enter'])) {
	if($name == '')
		$sql="SELECT * FROM member, host;";
    else
    	$sql="SELECT member.name , host.host_name
    	FROM member, host
    	WHERE member.id_doc = host.id_doc
    	AND ((member.name LIKE '$name')
    	OR (host.host_name LIKE '$host_name'));";
    $result = mysqli_query($connection, $sql);
    echo "<table border='1'>
    <tr> 
    <th>name</th>
    <th>host_name</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['host_name'] . "</td>";
        echo "</tr>";
    }
echo "</table>";
}
mysqli_close($connection);
?>