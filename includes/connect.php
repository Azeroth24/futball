<?php
	mysql_connect("localhost", "root", "") or die("Adatbázis-hiba!");

	mysql_set_charset('utf8');

	mysql_select_db("futball");
?>
