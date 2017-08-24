<?php
/**
 * Libreria per la gestione delle valute
 *
 * @package currency
 *
 */
/* ******************************************************************** */
/**
 *	PHP INCLUDE 
 */
/**
 *	PHP CLASS DEFINITION
 */
/**
 * Definizione della classe di contesto
 * @package Currency
 */
class Currency {
/**
 *	PHP SPECIFIC GLOBAL VARIABLES
 */
/**
 *	Cambia ricorsivamente il UID e il GID di file e directory a partire da un path specifico
 *
 *	@param string $stImporto Stringa da convertire
 *	@param string $stFormato Formato dell'importo stringa
 *	@param int $nNumDecimali Numero dei digit per le cifre decimali
 */
function string2Real ($stImporto, $stFormato, $nNumDecimali = 2) {
	if ($stImporto == "") { return ""; }
	switch ($stFormato) {
	case "XXXX,XX":
		$stImporto = str_replace(",", ".", $stImporto);
		break;
	case "X.XXX,XX":
		$stImporto = str_replace(".", "", $stImporto);
		$stImporto = str_replace(",", ".", $stImporto);
		break;
	}

	return round ($stImporto, $nNumDecimali);
}
/**
 *	Cambia ricorsivamente il UID e il GID di file e directory a partire da un path specifico
 *
 *	@param float $rImporto Importo da convertire in stringa 
 *	@param string $stFormato Formato dell'importo stringa
 *	@param int $nNumDecimali Numero dei digit per le cifre decimali
 */
function real2String ($rImporto, $stFormato, $nNumDecimali = 2, $noImporto = "") {

	if ($rImporto == "") { return $noImporto; }

	$rImporto = round ($rImporto, $nNumDecimali);

	list($stIntero, $stDecimale) = explode(".", $rImporto);

	$stRet 	= "";
	$n 		= strlen($stIntero);

	switch ($stFormato) {
	case "XXXX,XX":
		$a = explode(".", $rImporto);
		$stRet = $a[0];
		break;
	case "X.XXX":
	case "X.XXX,XX":
		$nStart = 3;

		while ($n > $nStart) {
			if ($stRet != "") { $stRet = "." . $stRet; }

			$stRet = substr($stIntero, -$nStart, 3) . $stRet;
			$nStart += 3;
		}

		$nStart -= 3;
		$nCharRimasti = $n - $nStart;
	
		// Controllo per eliminare il difetto: -.xxx,yy
		if ($nCharRimasti == 1 && $stIntero[0] == "-") {
			$stRet = "-" . $stRet;
			break;
		}

		if ($stRet != "") { $stRet = "." . $stRet; }

		$stRet = substr($stIntero, 0, $nCharRimasti) . $stRet;
		break;
	}

	if ($stFormato == "X.XXX") { return $stRet; }

	$decimali = "";
	for ($i=0; $i < $nNumDecimali; $i++) {
		$decimali .= "0";
	}

	return ($stDecimale != "") ? $stRet . "," . $stDecimale : $stRet . ",$decimali";
}

} //End of class definition.

?>
