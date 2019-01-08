<?
require '../function.php';	// Funkcie
require '../config.php';	// Zakladny a jediny konfiguracny subor
db_connect();
$id = parameter('id');
$query = query("SELECT `id`, `latinsky`, `popis` FROM `".$cfg['dreviny']."` WHERE `id` = '$id';");
$riadok = MySql_Fetch_Array($query);

$pocet_fotiek = pocet_fotiek($id);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Zahradníctvo INOX - <?=$riadok['latinsky'] ?></title>
</head>
<body>
<?
If (($riadok['popis'] == '') && ($pocet_fotiek == 1)) {
	echo '<img src="../'.$cfg['fotky_drevin'].fotka($id, 1, 'v').'">';
}
ElseIf (($riadok['popis'] != '') && ($pocet_fotiek == 0)) {
	echo $riadok['popis'];
}
ElseIf (($pocet_fotiek > 0)) {
	echo $riadok['popis']."<br>\n";
//	echo 'Fotogaleria:'."\n";
	for ($a=1; $a <= $pocet_fotiek; $a++) {		
		If (File_Exists('../'.$cfg['fotky_drevin'].fotka($id, $a, 'v'))) {
			echo '<img src="../'.$cfg['fotky_drevin'].fotka($id, $a, 'v').'">';
		}
		else
			echo '<img src="../'.$cfg['fotky_drevin'].fotka($id, $a, 'm').'">';
		
	}
}

//echo $pocet_fotiek.$riadok['popis'].'ss';
?>
</body>
</html>