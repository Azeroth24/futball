<?php

	function jatekos_modosit($nev, $kor, $nemzetiseg, $klub, $azn)
	{
		include("includes/connect.php");
		$modosit="UPDATE jatekos SET jatekos_nev='" . $nev . "', kor=" . $kor . ", nemzetiseg='" . $nemzetiseg . "', akt_klub=" . $klub . " WHERE jatekos_id=" . $azn . "";
		mysql_query("$modosit");
	}
	
	
	
	function jatekos_torol($jatekos)
	{
		include("includes/connect.php");
		$torol="UPDATE jatekos SET j_aktiv='0' WHERE jatekos_id='" . $jatekos . "'";
		mysql_query("$torol");
	}
	
	
	
	function klub_modosit($nev, $alapitva, $azn)
	{
		include("includes/connect.php");
		$modosit="UPDATE klub SET klub_nev='" . $nev . "', alapitva='" . $alapitva . "' WHERE klub_id=" . $azn . "";
		mysql_query("$modosit");
	}
	
	
	function klub_torol($klub)
	{
		include("includes/connect.php");
		$torol="UPDATE klub SET k_aktiv='0' WHERE klub_id='" . $klub . "'";
		mysql_query("$torol");
	}
	
	function atig_modosit($ki, $honnan, $hova, $mikor, $ar, $azn)
	{
		include("includes/connect.php");
		$modosit="UPDATE igazolasok SET jatekos=" . $ki . ", honnan=" . $honnan . ", hova=" . $hova . ", mikor='" . $mikor . "', ar='" . $ar . "' WHERE atig_id=" . $azn . "";
		//echo $modosit;
		mysql_query("$modosit");
	}
	
	function atig_torol($atig)
	{
		include("includes/connect.php");
		$torol="DELETE FROM igazolasok WHERE atig_id=" . $atig . "";
		//echo $torol;
		mysql_query("$torol");
	}
	
	function checkDateTime($data) {
    if (date('Y-m-d', strtotime($data)) == $data) {
        return true;
    } else {
        return false;
    }
}

?>