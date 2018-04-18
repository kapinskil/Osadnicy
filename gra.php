<?php
session_start();
if(!isset($_SESSION['zalogowany']))
{
	header('Location: index.php');
	exit();
}
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8"/>
	<meta http-equiv = "X-UA-Compatible" content = "IE =edge,chrome = 1"/>
	<title>Osadnicy - gra przeglądarkowa</title>
</head>

<body>

<?php
	
	
	echo "<p>Witaj ".$_SESSION['user'].'! [ <a href = "logout.php">wyloguj się!</a> ]</p>';
	echo "<p><b>Drewno</b>:".$_SESSION['drewno'];
	echo "| <b>Kamień</b>:".$_SESSION['kamien'];
	echo "| <b>zboze</b>:".$_SESSION['zboze']."</p>";
	
	echo "<p><b>E-mail</b>: ".$_SESSION['email']."</br>";
	echo "<b>Data wygaśnięcia premium</b>: ".$_SESSION['dnipremium']."</p>";	
	
	
	$dataczas = new DateTime('2150-05-01 22:10:55'); // symulowanie daty
	
	echo "Data i czas serwera: ".$dataczas->format('Y-m-d H:i:s')."<br>";
	
	$koniec = DateTime::createFromFormat('Y-m-d H:i:s',$_SESSION['dnipremium']);
	
	$roznica = $dataczas->diff($koniec);
	
	if($dataczas<$koniec) 
		echo "Pozostało premium: ".$roznica->format('%y lat, %m mies, %d dni, %h godziny, %i minuty, %s sekundy');
	else
		echo "Premium nie aktywne od: ".$roznica->format('%y lat, %m mies, %d dni, %h godziny, %i minuty, %s sekundy');
	
	//Funkcje zwaracające czas
	//echo time()."<br>";
	//echo mktime(19,37,0,4,2,2005)."<br>";
	//echo microtime()."<br>";
	//echo time()."<br>";
	//echo date('Y-m-d H:i:s')."<br>"; //aktualna data serwera
	//echo date('d.m.Y')."<br>";
	//$dataczas = new DateTime();
	
	//echo $dataczas->format('Y-m-d H:i:s')."<br>".print_r($dataczas);
	
	//$dzien = 10;
	//$miesiac = 7;
	//$rok = 1875;
	
	//if(checkdate($miesiac,$dzien,$rok)) 
	//	echo "<br>Poprawana data!" ;
	//else echo "<br>Niepoprawna data!";
	
	
	
?>
	

</body>
</html>