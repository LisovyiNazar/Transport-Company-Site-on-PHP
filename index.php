<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
	<title>Human Resources</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="cont">
	<?php 
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$database = "pracownicy";

	$mysqli = new mysqli($servername, $username, $password, $database);
	$stan = $mysqli->query("SELECT DISTINCT stanowisko FROM stanowiska") ;

	?>
	<div class="menu">
		<h1>Dział HR</h1>
	</div>

	<div class="menu">
		<form method="post" action="#" style="width:200px">
		<!--Tu dodaj listę rozwijaną z nazwami stanowisk-->
			<select name="stanowisko[]" id="">
				<?php
					while ($rows = $stan->fetch_assoc()) {
						$stanowisko = $rows['stanowisko'];
						echo "<option value='$stanowisko'>$stanowisko</option>";
					}
				?>
			</select>
			<input type="submit" name="submit" value="Submit" />
		</form>
	</div>

	<div class="menu">
		<img src="img/logo.jpg" alt="Obraz logo">
	</div>

	<div id="lewy">
		<h2>Dodaj nowego pracownika!</h2> 
		<form action="process.php" method="POST">
			<div class="form-group">
				<label for="id">ID pracownika</label>
				<input type="text" name="id" class="form-control" id="" placeholder="Enter your name" value="<?php echo $name; ?>">
			</div>
			<div class="form-group">
				<label for="urodzenia">Data urodzenia</label>
				<input type="text" name="urodzenia" class="form-control" id="" placeholder="Enter your phone" value="<?php echo $phone; ?>">
			</div>
			<div class="form-group">
				<label for="imie">Imie</label>
				<input type="text" name="imie" class="form-control" id="" placeholder="Enter your address" value="<?php echo $address; ?>">
			</div>
			<div class="form-group">
				<label for="nazwisko">Nazwisko</label>
				<input type="text" name="nazwisko" class="form-control" id="" placeholder="Enter your name" value="<?php echo $name; ?>">
			</div>
			<div class="form-group">
				<label for="plec">Plec</label>
				<input type="text" name="plec" class="form-control" id="" placeholder="Enter your phone" value="<?php echo $phone; ?>">
			</div>
			<div class="form-group">
				<label for="zatrudnienia">Data zatrudnienia</label>
				<input type="text" name="zatrudnienia" class="form-control" id="" placeholder="Enter your address" value="<?php echo $address; ?>">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="save">Save</button>
			</div>
		</form>         
	</div>

	<div id="prawy">
		<!-- /* Tu zamieść kod php wyswietlający nazwiska osób pracujących na wybranym mstanowisku */ -->
		<h2>Pracownicy na wybranm stanowisku:</h2>
		<?php
		if(isset($_POST['submit'])) {

			foreach ($_POST['stanowisko'] as $select)
			{
				$imie = mysqli_query($mysqli, "SELECT t1.imie, t1.nazwisko  FROM pracownicy t1 JOIN stanowiska t2 on(t1.id_pracownika=t2.id_pracownika) WHERE t2.stanowisko = '$select'");
				while($person = mysqli_fetch_assoc($imie)) {
					echo $person['imie'];
					echo " ";
					echo $person['nazwisko'];
					echo "<br>";
				}
			}
		}
		?>
	</div>

	<div id="stopka">
		<p> Skontaktuj się z nami <br> Adres: <br> Telefon: </p>
	</div>
</div>

</body>
</html>