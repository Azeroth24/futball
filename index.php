<?php

	include("includes/connect.php");
	
	$jatekoslek="SELECT * FROM jatekos INNER JOIN klub ON jatekos.akt_klub=klub.klub_id WHERE j_aktiv=1";
	$jatekosres=mysql_query($jatekoslek);
	
	$klublek="SELECT * FROM klub WHERE k_aktiv=1";
	$klubres=mysql_query($klublek);
	
	$iglek="SELECT * FROM igazolasok INNER JOIN jatekos ON igazolasok.jatekos=jatekos.jatekos_id";
	$igres=mysql_query($iglek);
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Futball játékosok</title>
<link rel="stylesheet" href="includes/style.css">
</head>

<body>
	<div id="wrapper">
	<?php
	echo "<h3>Játékosok</h3>";
	echo "<table align=\"center\" border=\"1\">";
	echo "<th>Neve</th><th>Kora</th><th>Nemzetisége</th><th>Klubja</th>";
		while($sor=mysql_fetch_array($jatekosres))
		{
			$szam=$sor['jatekos_id'];
			echo "<tr>";
				echo "<td>" . $sor['jatekos_nev'] . "</td>";
				echo "<td>" . $sor['kor'] . "</td>";
				echo "<td>" . $sor['nemzetiseg'] . "</td>";
				echo "<td>" . $sor['klub_nev'] . "</td>";
				echo "<td><a href=\"muveletvegez.php?a=$szam\">Módosít</a></td>";
				echo "<td><a href=\"muveletvegez.php?adel=$szam\">Töröl</a></td>";
			echo "</tr>";
		}
	echo "</table><br>";
	
	echo "<h3>Klubok</h3>";
	echo "<table align=\"center\" border=\"1\">";
	echo "<th>Klub név</th><th>Alapítás ideje</th>";
		while($sor=mysql_fetch_array($klubres))
		{
			$szam=$sor['klub_id'];
			echo "<tr>";
				echo "<td>" . $sor['klub_nev'] . "</td>";
				echo "<td>" . $sor['alapitva'] . "</td>";
				echo "<td><a href=\"muveletvegez.php?b=$szam\">Módosít</a></td>";
				echo "<td><a href=\"muveletvegez.php?bdel=$szam\">Töröl</a></td>";
			echo "</tr>";
		}
	echo "</table><br>";
	
	echo "<h3>Átigazolások története:</h3>";
	echo "<table align=\"center\" border=\"1\">";
	echo "<th>Játékos</th><th>Honnan</th><th>Hová</th><th>Mikor</th><th>Mennyiért</th>";
		while($sor=mysql_fetch_array($igres))
		{
			$szam=$sor['atig_id'];
			
			$honnanlek="SELECT * FROM klub WHERE klub_id=" . $sor['honnan'] . "";
			$honnanres=mysql_query($honnanlek);
			$honnansor=mysql_fetch_array($honnanres);
			$honnan=$honnansor['klub_nev'];
			
			$hovalek="SELECT * FROM klub WHERE klub_id=" . $sor['hova'] . "";
			$hovares=mysql_query($hovalek);
			$hovasor=mysql_fetch_array($hovares);
			$hova=$hovasor['klub_nev'];
			
			echo "<tr>";
				echo "<td>" . $sor['jatekos_nev'] . "</td>";
				echo "<td>" . $honnan . "</td>";
				echo "<td>" . $hova . "</td>";
				echo "<td>" . $sor['mikor'] . "</td>";
				echo "<td>" . $sor['ar'] . "</td>";
				echo "<td><a href=\"muveletvegez.php?c=$szam\">Módosít</a></td>";
				echo "<td><a href=\"muveletvegez.php?cdel=$szam\">Töröl</a></td>";
			echo "</tr>";
		}
	echo "</table><br>";
	?>
    </div>
    
</body>
</html>