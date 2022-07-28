<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$database = "pracownicy";

	$mysqli = new mysqli($servername, $username, $password, $database);

if(isset($_POST['save'])) {
    $id = $_POST['id'];
    $urodzenia = $_POST['urodzenia'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $plec = $_POST['plec'];
    $zatrudnienia = $_POST['zatrudnienia'];

    $mysqli->query("INSERT INTO pracownicy (id_pracownika, data_urodzenia, imie, nazwisko, plec, data_zatrudnienia) VALUES ('$id', '$urodzenia', '$imie', '$nazwisko', '$plec', '$zatrudnienia')") or die($mysqli->error);

    header('location: index.php');
}