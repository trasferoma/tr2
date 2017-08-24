<?php
/**
 * Classe context
 *
 * @package context
 *
 */
/* ******************************************************************** */
/**
 *	PHP INCLUDE 
 */
require_once("./phplibs/framework/SessionContextBase.php");
/**
 *	PHP CLASS DEFINITION
 */
/**
 * Definizione della classe di contesto
 * @package utility
 */
class SessionContext extends SessionContextBase {
	var $stLingua;
	var $idLingua;
	var $ultimoUrlVisitato;
	var $urlIndietro;
	var $struct;
/** *************************************************** */
/**
 *	Costruttore
 *	@param string  $stLingua Lingua sulla base della quale caricare il dizionario
 *	@param string  $idLingua Lingua sulla base della quale fare le query
 */
function SessionContext( $stLingua = DEFAULT_LANG_ABBREV, $idLingua = DEFAULT_LANG) {
	$this->SessionContextBase($stLingua, $idLingua);
	$this->stLingua = $stLingua;
	$this->idLingua = $idLingua;
	$this->ultimoUrlVisitato = false;
	$this->urlIndietro = array();
	$this->struct = "";
	$this->chiaviRicerca = "";
}

function setStructDaUsare($struct) { $this->struct = $struct; }
function getStructDaUsare() { return $this->struct; }

function getLingua() { return $this->stLingua; }
function setLingua($lingua) { $this->stLingua = $lingua; }

function getIdLingua() { return $this->idLingua; }
function setIdLingua($lingua) { $this->idLingua = $lingua; }

function getUltimoIndirizzoVisitato() { return $this->ultimoUrlVisitato; }
function setUltimoIndirizzoVisitato($url) {$this->ultimoUrlVisitato = $url;}

function getChiaviRicerca() { return $this->chiaviRicerca; }
function setChiaviRicerca($chiaviRicerca) {$this->chiaviRicerca = $chiaviRicerca;}

function popBackUrl() { 
	$i = count($this->urlIndietro) -1;
	$url = $this->urlIndietro[$i];
	unset($this->urlIndietro[$i]);
	return $url;
}
function pushBackUrl($url) {
	$this->urlIndietro[] = $url;
}
function debugMostraStack() {
	$st = "";
	for ($i = 0 ; $i < count($this->urlIndietro) ; $i++) {
		$st .= "&nbsp;&nbsp;&nbsp;&nbsp;" . $this->urlIndietro[$i] . "<br>";
	}
	return $st;
}
/** *************************************************** */
/**
 *	@param Context $hCtx Il contesto
 */
function destroy( ) {
	return true;
}
/** *************************************************** */
} //End of class definition.
?>
