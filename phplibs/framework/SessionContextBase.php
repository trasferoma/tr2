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
/**
 *	PHP CLASS DEFINITION
 */
/**
 * Definizione della classe di contesto
 * @package utility
 */
class SessionContextBase {
	var $stLingua;
	var $idLingua;
	var $ultimoUrlVisitato;
	var $urlIndietro;

	var $moduloCorrente;
	var $nID; 
	var $stUName; 
	var $stNome;
	var $stCognome;
	var $paginaVisualizzata;
/** *************************************************** */
/**
 *	Costruttore
 *	@param string  $stLingua Lingua sulla base della quale caricare il dizionario
 *	@param string  $idLingua Lingua sulla base della quale fare le query
 */
function SessionContextBase( $stLingua = DEFAULT_LANG_ABBREV, $idLingua = DEFAULT_LANG) {
	$this->stLingua = $stLingua;
	$this->idLingua = $idLingua;
	$this->ultimoUrlVisitato = false;
	$this->urlIndietro = array();
	$this->paginaVisualizzata = false;
	$this->utente = false;
}

function getLingua() { return $this->stLingua; }
function setLingua($lingua) { $this->stLingua = $lingua; }

function getIdLingua() { return $this->idLingua; }
function setIdLingua($lingua) { $this->idLingua = $lingua; }

function getUltimoIndirizzoVisitato() { return $this->ultimoUrlVisitato; }
function setUltimoIndirizzoVisitato($url) {$this->ultimoUrlVisitato = $url;}

function popBackUrl() { 
	$i = count($this->urlIndietro) -1;
	$url = $this->urlIndietro[$i];
	unset($this->urlIndietro[$i]);
	return $url;
}
function pushBackUrl($url) {
	$this->urlIndietro[] = $url;
}
function setUltimoOrderBy($chiave, $orderBy) {
	$this->setElemento($chiave, $orderBy);
}
function getUltimoOrderBy($chiave) {
	return $this->getElemento($chiave);
}
function setElemento($chiave, $valore) {
	$this->bufferElementi[$chiave] = $valore;
}
function getElemento($chiave) {
	return $this->bufferElementi[$chiave];
}

function debugMostraStack() {
	$st = "";
	for ($i = 0 ; $i < count($this->urlIndietro) ; $i++) {
		$st .= "&nbsp;&nbsp;&nbsp;&nbsp;" . $this->urlIndietro[$i] . "<br>";
	}
	return $st;
}
function setModuloCorrente($m) { $this->moduloCorrente = $m; }
function getModuloCorrente() { return $this->moduloCorrente; }

function setUtente($utente) { $this->utente = $utente; }
function getUtente() { return $this->utente; }

function getIdUtente() { return $this->idUtente; }
function getNome() { return $this->nome; }
function getCognome() { return $this->cognome; }
function getUserName() { return $this->userName; }

function setPaginaVisualizzata($k, $cp) { $this->paginaVisualizzata[$k] = $cp; }
function getPaginaVisualizzata($k) { return $this->paginaVisualizzata[$k]; }

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
