<?php
require_once 'connection.php';
$link = mysqli_connect($host, $user, $password, $db)
or die ("Ошибка подключения к базе данных" . mysqli_error($link));
echo "Вы подключились! <br/>";
$data = mysqli_query($link, 'use '.$db);
if (!$data) {
echo("Error use database: ".mysqli_error($link)."<br>");
exit(); 
}
echo('Successful use database<br>');
$sql = "CREATE TABLE club (
id_club int(11) AUTO_INCREMENT,
club_title varchar(255) NOT NULL,
PRIMARY KEY(id_club)
);";
if (mysqli_query($link, $sql)) {
    echo "Table created successfully, ";
} else {
    echo "Error creating table, " . mysqli_error($link);
}
$sql = "INSERT INTO club (club_title) VALUES ('Animals'), ('Forest'), ('Power'), ('Oak'), ('Drozd');";
if (mysqli_query($link, $sql)) {
    echo "inserted successfully. <br/>";
} else {
    echo "Error inserting. <br/>" . mysqli_error($link);
}
$sql ="
CREATE TABLE member (
id_doc int(11) AUTO_INCREMENT,
id_club int(11) NOT NULL,
name varchar(255) NOT NULL,
breed varchar(255) NOT NULL,
old date NOT NULL,
sex varchar(3) NOT NULL,
PRIMARY KEY(id_doc),
FOREIGN KEY(id_club) REFERENCES club(id_club)
);";
if (mysqli_query($link, $sql)) {
    echo "Table created successfully, <br/>";
} else {
    echo "Error creating table, <br/>" . mysqli_error($link);
}
$sql = "INSERT INTO member (id_club, name, breed, old, sex) VALUES 
	('1', 'Crysenshtern', 'terrier', '2016-11-20', 'fe'),
	('2', 'Baris', 'beagle', '2013-06-05', 'ma'),
	('3', 'Kolyan', 'bulldog', '2015-08-02', 'ma'),
	('4', 'Barsuk', 'beagle', '2014-03-08', 'ma'),
	('5', 'Harry Potter', 'terrier', '2013-05-05', 'fe');";
if (mysqli_query($link, $sql)) {
    echo "inserted successfully. <br/>";
} else {
    echo "Error inserting. <br/>" . mysqli_error($link);
}
$sql = "create table med_inf(
id_polis int(11) AUTO_INCREMENT,
id_doc int(11) NOT NULL,
dat date NOT NULL,
med_inf varchar(255) NOT NULL,
PRIMARY KEY(id_polis),
FOREIGN KEY(id_doc) REFERENCES member (id_doc)
);";
if (mysqli_query($link, $sql)) {
    echo "Table created successfully, ";
} else {
    echo "Error creating table, " . mysqli_error($link);
}
$sql = "INSERT INTO med_inf (id_doc, dat, med_inf) VALUES 
	('1', '2017-07-28', 'Ok'),
	('2', '2017-07-28', 'Ok'),
	('3', '2017-07-28', 'Ok'),
	('4', '2017-07-28', 'Ok'),
	('5', '2017-07-28', 'Ok');";
if (mysqli_query($link, $sql)) {
    echo "inserted successfully. <br/>";
} else {
    echo "Error inserting. <br/>" . mysqli_error($link);
}
$sql = "create table host(
id_host int(11) AUTO_INCREMENT,
host_name varchar(255) NOT NULL,
id_doc int(11) NOT NULL,
PRIMARY KEY(id_host),
FOREIGN KEY(id_doc) REFERENCES member (id_doc)
);";
if (mysqli_query($link, $sql)) {
    echo "Table created successfully, <br/>";
} else {
    echo "Error creating table, <br/>" . mysqli_error($link);
}
$sql = "INSERT INTO host (host_name, id_doc) VALUES 
	('Gasaev A.P.', '1'),
	('Petrov S.Y.', '2'),
	('Tymofeeva O.P.', '3'),
	('Ognev D.O.', '4'),
	('Tompson V.V.', '5');";
if (mysqli_query($link, $sql)) {
    echo "inserted successfully. <br/>";
} else {
    echo "Error inserting. <br/>" . mysqli_error($link);
}
$sql = "CREATE TABLE price_ring (
id_ring int(11) AUTO_INCREMENT,
ring_number int(11) NOT NULL,
id_doc int(11) NOT NULL,
PRIMARY KEY(id_ring),
FOREIGN KEY(id_doc) REFERENCES member (id_doc)
);";
if (mysqli_query($link, $sql)) {
    echo "Table created successfully, <br/>";
} else {
    echo "Error creating table, <br/>" . mysqli_error($link);
}
$sql = "INSERT INTO price_ring (ring_number, id_doc) VALUES 
	('1', '1'),
	('2', '2'),
	('3', '3'),
	('4', '4'),
	('5', '5');";
if (mysqli_query($link, $sql)) {
    echo "inserted successfully. <br/>";
} else {
    echo "Error inserting. <br/>" . mysqli_error($link);
}
$sql="CREATE TABLE expert (
id_expert int(11) AUTO_INCREMENT,
expert_name  varchar(255) NOT NULL,
id_club int(11) NOT NULL,
id_ring int(11) NOT NULL,
PRIMARY KEY(id_expert),
FOREIGN KEY(id_club) REFERENCES club (id_club),
FOREIGN KEY(id_ring) REFERENCES price_ring (id_ring)
);";
if (mysqli_query($link, $sql)) {
    echo "Table created successfully, <br/>";
} else {
    echo "Error creating table, <br/>" . mysqli_error($link);
}
$sql = "INSERT INTO expert (expert_name, id_club, id_ring) VALUES 
	('Temnov V.O.', '1', '1'),
	('Ivanov L.A.', '1',  '2'),
	('Petrov N.O.', '2', '2'),
	('Podgornov A.P.', '2', '3'),
	('Pirsov N.A.', '3', '3');";
if (mysqli_query($link, $sql)) {
    echo "inserted successfully. <br/>";
} else {
    echo "Error inserting. <br/>" . mysqli_error($link);
}
$sql ="CREATE TABLE points (
id_number int(11) AUTO_INCREMENT,
id_doc int(11) NOT NULL,
id_expert int(11) NOT NULL,
id_ring int(11) NOT NULL,
points int(11) NOT NULL,
PRIMARY KEY(id_number),
FOREIGN KEY(id_doc) REFERENCES member (id_doc),
FOREIGN KEY(id_expert) REFERENCES expert (id_expert),
FOREIGN KEY(id_ring) REFERENCES price_ring (id_ring)
);";
if (mysqli_query($link, $sql)) {
    echo "Table created successfully, ";
} else {
    echo "Error creating table, " . mysqli_error($link);
}
$sql = "INSERT INTO points (id_doc, id_expert, id_ring, points) VALUES 
	('1', '1', '1', '23'),
	('2', '2', '2', '25'),
	('3', '3', '3', '24'),
	('4', '4', '4', '24'),
	('5', '5', '5', '25');";
if (mysqli_query($link, $sql)) {
    echo "inserted successfully. <br/>";
} else {
    echo "Error inserting. <br/>" . mysqli_error($link);
}
mysqli_close($link);
?>