<?php
/**
 * Classe 
 *
 * @package 
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
 * @package 
 */
class BaseClass {
	var $smarty;
	var $hCtx;
	var $hSessionCtx;
	var $aParam;
	var $stModKey;
	var $paginaDaMostrare;

/** *************************************************** */
/**
 *	Costruttore
 */
function BaseClass( &$hCtx, &$hSessionCtx, $stModKey ) {
	$this->smarty = &$hCtx->smarty;
	$this->aParam 	 = $hCtx->aRequest;
	$this->hCtx 	 = &$hCtx;
	$this->hSessionCtx = &$hSessionCtx;
	$this->stModKey  = $stModKey;

	$this->paginaDaMostrare = "";
}
function isPaginaDaMostrare() { return strlen($this->paginaDaMostrare) > 0 ? true : false ; }
function getPaginaDaMostrare() { return $this->paginaDaMostrare; }
function setPaginaDaMostrare($pagina = "") { $this->paginaDaMostrare = $pagina; }
/** *************************************************** */
/**
 *
 */
function destroy( ) {

	return true;
}
/** *************************************************** */
} //End of class definition.
?>
