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
	var $modulo;
	var $paginaDaMostrare;



/** *************************************************** */
/**
 *	Costruttore
 */
function BaseClass( &$hCtx, &$hSessionCtx, $modulo ) {
	$this->smarty = &$hCtx->smarty;
	$this->hCtx 	 = &$hCtx;
	$this->hSessionCtx = &$hSessionCtx;
	$this->modulo  = $modulo;

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
