<?php

	if(isset($_GET['a']))			//	JÁTÉKOS módosító űrlap
	{
		include("includes/connect.php");
		
		$lek="SELECT * FROM jatekos WHERE jatekos_id='" . $_GET['a'] . "'";
		$res=mysql_query($lek);		
		$sor=mysql_fetch_array($res);
		
		$klublek="SELECT * FROM klub WHERE k_aktiv=1";
		$klubres=mysql_query($klublek);
	
		echo "<form action=\"muveletvegez.php\" name=\"form\" method=\"post\">";
		echo "<table>";
			echo "<tr>";
				echo "<td>Azonosítója:</td>";
				echo "<td><input type=\"text\" id=\"azn\" name=\"azn\" value=\"" . $sor['jatekos_id'] . "\" readonly/></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Neve:</td>";
				echo "<td><input type=\"text\" id=\"nev\" name=\"nev\" value=\"" . $sor['jatekos_nev'] . "\"/></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Kora:</td>";
				echo "<td><input type=\"text\" id=\"kor\" name=\"kor\" value=\"" . $sor['kor'] . "\"/></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Nezetisége:</td>";
				echo "<td><input type=\"text\" id=\"nemzetiseg\" name=\"nemzetiseg\" value=\"" . $sor['nemzetiseg'] . "\"/></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Klub:</td>";
				echo "<td>";
					echo "<select id=\"klub\" name=\"klub\">";
						while($klubsor=mysql_fetch_array($klubres))
						{
							if($sor['akt_klub']	==	$klubsor['klub_id'])
							{
								echo "<option value=\"" . $klubsor['klub_id'] . "\" selected>" . $klubsor['klub_nev'] . "</option>>";
							}
							else
							{
								echo "<option value=\"" . $klubsor['klub_id'] . "\">" . $klubsor['klub_nev'] . "</option>>";
							}
						}
					echo "</select>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td><input type=\"submit\" name=\"submit\" value=\"Mentés\">";
			echo "</tr>";
		echo "</table>";
		echo "</form>";
			echo "<form name=\"calcel\" action=\"index.php\" method=\"post\">";
				echo "<input type=\"submit\" name=\"cancel\" value=\"Mégse\">";
			echo "</form>";
	}
	
	
	
	if(isset($_GET['b']))					// KLUB módosító űrlap
	{
		include("includes/connect.php");
		
		$lek="SELECT * FROM klub WHERE klub_id='" . $_GET['b'] . "'";
		$res=mysql_query($lek);		
		$sor=mysql_fetch_array($res);
	
		echo "<form action=\"muveletvegez.php\" name=\"form\" method=\"post\">";
		echo "<table>";
			echo "<tr>";
				echo "<td>Azonosítója:</td>";
				echo "<td><input type=\"text\" id=\"azn\" name=\"klubazn\" value=\"" . $sor['klub_id'] . "\" readonly/></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Neve:</td>";
				echo "<td><input type=\"text\" id=\"nev\" name=\"klubnev\" value=\"" . $sor['klub_nev'] . "\"/></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Alapítás ideje:</td>";
				echo "<td><input type=\"text\" id=\"kor\" name=\"alapitva\" value=\"" . $sor['alapitva'] . "\"/></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td><input type=\"submit\" name=\"submit\" value=\"Mentés\">";
			echo "</tr>";
		echo "</table>";
		echo "</form>";
			echo "<form name=\"calcel\" action=\"index.php\" method=\"post\">";
				echo "<input type=\"submit\" name=\"cancel\" value=\"Mégse\">";
			echo "</form>";
	}
	
	
	if(isset($_GET['c']))		//	ÁTIGAZOLÁS	módosító űrlap
	{
		include("includes/connect.php");
		
		$lek="SELECT * FROM igazolasok WHERE atig_id=" . $_GET['c'] . "";
		$res=mysql_query($lek);
		$sor=mysql_fetch_array($res);
		
		$jatekoslek="SELECT * FROM jatekos WHERE j_aktiv=1";
		$jatekosres=mysql_query($jatekoslek);
		
		$honnanlek="SELECT * FROM klub WHERE k_aktiv=1";
		$honnanres=mysql_query($honnanlek);
		
		$hovalek="SELECT * FROM klub WHERE k_aktiv=1";
		$hovares=mysql_query($hovalek);
		
		echo "<form action=\"muveletvegez.php\" name=\"form\" method=\"post\">";
		echo "<table>";
			echo "<tr>";
				echo "<td>Átigazolás ID:</td>";
				echo "<td><input type=\"text\" id=\"atig\" name=\"atig\" value=\"" . $sor['atig_id'] . "\"/ readonly></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Ki:</td>";
				echo "<td>";
					echo "<select id=\"ki\" name=\"ki\">";
							while($jatekossor=mysql_fetch_array($jatekosres))
							{
								if($sor['jatekos']	==	$jatekossor['jatekos_id'])
								{
									echo "<option value=\"" . $jatekossor['jatekos_id'] . "\" selected>" . $jatekossor['jatekos_nev'] . "</option>>";
								}
								else
								{
									echo "<option value=\"" . $jatekossor['jatekos_id'] . "\">" . $jatekossor['jatekos_nev'] . "</option>>";
								}
							}
					echo "</select>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Honnan:</td>";
				echo "<td>";
					echo "<select id=\"honnan\" name=\"honnan\">";
							while($honnansor=mysql_fetch_array($honnanres))
							{
								if($sor['honnan']	==	$honnansor['klub_id'])
								{
									echo "<option value=\"" . $honnansor['klub_id'] . "\" selected>" . $honnansor['klub_nev'] . "</option>>";
								}
								else
								{
									echo "<option value=\"" . $honnansor['klub_id'] . "\">" . $honnansor['klub_nev'] . "</option>>";
								}
							}
					echo "</select>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Hova:</td>";
				echo "<td>";
					echo "<select id=\"hova\" name=\"hova\">";
							while($hovasor=mysql_fetch_array($hovares))
							{
								if($sor['hova']	==	$hovasor['hova'])
								{
									echo "<option value=\"" . $hovasor['klub_id'] . "\" selected>" . $hovasor['klub_nev'] . "</option>>";
								}
								else
								{
									echo "<option value=\"" . $hovasor['klub_id'] . "\">" . $hovasor['klub_nev'] . "</option>>";
								}
							}
					echo "</select>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Mikor:</td>";
				echo "<td><input type=\"text\" id=\"mikor\" name=\"mikor\" value=\"" . $sor['mikor'] . "\"/></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Mennyiért:</td>";
				echo "<td><input type=\"text\" id=\"mennyiert\" name=\"mennyiert\" value=\"" . $sor['ar'] . "\"/></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td><input type=\"submit\" name=\"submit\" value=\"Mentés\">";
			echo "</tr>";
		echo "</table>";
		echo "</form>";
			echo "<form name=\"calcel\" action=\"index.php\" method=\"post\">";
				echo "<input type=\"submit\" name=\"cancel\" value=\"Mégse\">";
			echo "</form>";
	}	
	
	
	
	//		JÁTÉKOS módosításainak adatbázisban való elmentése
	if(isset($_POST['nev'])	&&	isset($_POST['kor'])	&&	isset($_POST['nemzetiseg'])	&&	isset($_POST['azn'])	&&	isset($_POST['klub']))
	{
		include("functions.php");
		
		$errors=array();
		if(empty($_POST['nev'])	||	empty($_POST['kor'])||	empty($_POST['nemzetiseg']))
		{
			$errors[]="Minden mezőt ki kell tölteni!";
		}
		if(strlen($_POST['nev'])>25)
		{
			$errors[]="Név túl hosszú!";
		}
		if(strlen($_POST['nev'])<4)
		{
			$errors[]="Név túl rövid!";
		}
		if(strlen($_POST['nemzetiseg'])>30)
		{
			$errors[]="Nemzetiseg túl hosszú!";
		}
		if(strlen($_POST['nemzetiseg'])<3)
		{
			$errors[]="Nemzetiseg túl rövid!";
		}
		
		if(!is_numeric($_POST['kor']))
		{
			$errors[]="Kornak számnak kell lennie!";
		}else
		{
			if($_POST['kor']<=0	|| $_POST['kor']>100)
			{
				$errors[]="Kornak 0-100 közé kell esnie!";
			}
		}
		
		if(!empty($errors))
		{
			foreach($errors as $error)
			{
				echo "<strong>" . $error . "</strong><br>";
			}
			$kuld="muveletvegez.php?a=" . $_POST['azn'] . "";
			echo "<form action=\"$kuld\" method=\"post\">";
				echo "<input type=\"submit\" name=\"submit\" value=\"Vissza\">";
			echo "</form>";
		}
		else
		{
			jatekos_modosit($_POST['nev'], $_POST['kor'], $_POST['nemzetiseg'], $_POST['klub'], $_POST['azn']);
			header("location: index.php");
		}
	}
	
	
	//		KLUB módosításainak adatbázisban való elmentése
	if(isset($_POST['klubnev'])	&&	isset($_POST['alapitva'])	&&	isset($_POST['klubazn']))
	{
		include("functions.php");
		$errors=array();
		if(empty($_POST['klubnev'])	||	empty($_POST['alapitva']))
		{
			$errors[]="Minden mezőt ki kell tölteni!";
		}
		if(strlen($_POST['klubnev'])>25)
		{
			$errors[]="Klubnév túl hosszú!";
		}
		if(strlen($_POST['klubnev'])<4)
		{
			$errors[]="Klubnév túl rövid!";
		}
		if(checkDateTime($_POST['alapitva']))
		{echo "Dátum";}else{$errors[]="Nem dátum! A helyes formátum: 2012-01-01";}
		
		if(!empty($errors))
		{
			foreach($errors as $error)
			{
				echo "<strong>" . $error . "</strong><br>";
			}
			$kuld="muveletvegez.php?b=" . $_POST['klubazn'] . "";
			echo "<form action=\"$kuld\" method=\"post\">";
				echo "<input type=\"submit\" name=\"submit\" value=\"Vissza\">";
			echo "</form>";
		}
		else
		{
			klub_modosit($_POST['klubnev'], $_POST['alapitva'], $_POST['klubazn']);
			header("location: index.php");
		}
	}


	//		ÁTIGAZOLÁS módosításainak adatbázisban való elmentése
	if(isset($_POST['ki'])	&&	isset($_POST['honnan'])	&&	isset($_POST['hova'])	&&	isset($_POST['mikor'])	&&	isset($_POST['mennyiert'])	&&	isset($_POST['atig']))
	{
		include("functions.php");
		
		$errors=array();
		if(!checkDateTime($_POST['mikor']))
		{$errors[]="Nem dátum! A helyes formátum: 2012-01-01";}
		if(!is_numeric($_POST['mennyiert']))
		{
			$errors[]="Az árnak számnak kell lennie!";
		}else
		{
			if($_POST['mennyiert']<1	|| $_POST['mennyiert']>1000000)
			{
				$errors[]="Az árnak 0-1.000.000 közé kell esnie!";
			}
		}
		if(!empty($errors))
		{
			foreach($errors as $error)
			{
				echo "<strong>" . $error . "</strong><br>";
			}
			$kuld="muveletvegez.php?c=" . $_POST['atig'] . "";
			echo "<form action=\"$kuld\" method=\"post\">";
				echo "<input type=\"submit\" name=\"submit\" value=\"Vissza\">";
			echo "</form>";
		}
		else
		{
			atig_modosit($_POST['ki'], $_POST['honnan'], $_POST['hova'], $_POST['mikor'], $_POST['mennyiert'], $_POST['atig']);
			header("location: index.php");
		}
	}
	
	
	if(isset($_GET['adel']))		//	JÁTÉKOS törlése(inaktívvá tétele)
	{
		include("functions.php");
		jatekos_torol($_GET['adel']);
		
		header("location: index.php");
	}
	
	
	
	if(isset($_GET['bdel']))		//	KLUB törlése(inaktívvá tétele)
	{
		include("functions.php");
		klub_torol($_GET['bdel']);
		
		header("location: index.php");
	}
	
	
	if(isset($_GET['cdel']))		//	KLUB törlése(inaktívvá tétele)
	{
		include("functions.php");
		atig_torol($_GET['cdel']);
		
		header("location: index.php");
	}
?>