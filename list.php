 <?php
// Подключение к базе данных
require_once 'connection.php';
  $connection = mysqli_connect($host, $user, $password, $db);
  
$table_sql = mysqli_query($connection, "SELECT * FROM member WHERE id_doc > 5");
//SELECT member.id_doc, member.name, host.host_name, price_ring.id_ring, expert.expert_name, points.points FROM
//member, host, price_ring, expert, points
//WHERE member.id_doc = host.id_doc
//AND member.id_doc = price_ring.id_ring
//AND price_ring.id_ring = expert.id_ring
//AND expert.id_expert = points.id_expert;");
  echo "<br><h2 align=left>Dogs_show</h2>";
  echo "<table border=1>
  <tr>
  <td align=center width = 100>id_doc</td>
  <td align=center width = 100>name</td>
  <td align=center width = 100>host_name</td>
  <td align=center width = 100>ring_number</td>
  <td align=center width = 100>expert_name</td>
  <td align=center width = 100>points</td>
  <td align=center width = 100>Update</td>
  <td align=center width = 100>Delete</td>
  </tr>";
  while ($table = mysqli_fetch_assoc($table_sql))
  {
  echo "
  <table border=1>
  <tr>
  <td align=center width = 100>$table[id_doc]</td>
  <td align=center width = 100>$table[name]</td>
  <td align=center width = 100>$table[host_name]</td>
  <td align=center width = 100>$table[id_ring]</td>
  <td align=center width = 100>$table[expert_name]</td>
  <td align=center width = 100>$table[points]</td>
  <td align=center width = 100><a href='edit.php?id=" . $table[id_doc] . "'>update</a></td>
  <td align=center width = 100><a href='delete.php?id=" . $table[id_doc] . "'>delete</a></td>
  </tr> 
  </table>"; 
  }
  $result2 = mysqli_query($connection, "SELECT * FROM member;");
  ?>
Добавить ученика:
  <form action="dbadd.php" method="get">
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
    </select><br>
</form>