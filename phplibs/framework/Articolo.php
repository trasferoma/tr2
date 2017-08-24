<?php
/**
 * Classe context
 *
 * @package context
 *
 */
require_once("./phplibs/framework/BaseClass.php");
require_once("./phplibs/db/ArticoloDb.php");
require_once("./phplibs/db/AlbumDb.php");
/**
 *	PHP CLASS DEFINITION
 */
/**
 * Definizione della classe di contesto
 * @package formazione
 */
class Articolo extends BaseClass {
/** *************************************************** */
/**
 *	Costruttore
 */
function Articolo(&$hCtx, &$hSessionCtx, $stModKey, $fNoWork=false) {
	$this->BaseClass($hCtx, $hSessionCtx, $stModKey);
}
/** *************************************************** */
/**
 *
 */
function getListaAlbumCollegati(&$hCtx, &$hSessionCtx, $idArticolo) {
	return ArticoloDb::getListaAlbumCollegati(&$hCtx, &$hSessionCtx, $idArticolo);
}
/** *************************************************** */
/** 
 *	
 */
function getCopertineAlbum(&$hCtx, &$hSessionCtx, $idArticolo, $listaAlbum = false) {
	if ($listaAlbum == false) {
		$listaAlbum = $this->getListaAlbumCollegati($this->hCtx, $this->hSessionCtx, $idArticolo);
	}

	if ($listaAlbum == false) { return false; }

	foreach ($listaAlbum as $album) {
		$idAlbum = $album["idattach"];
		$listaFoto = AlbumDb::getListaFotoAlbum($hCtx, $hSessionCtx, $idAlbum);
		$copertina = $listaFoto[0];
		// echo "<pre>"; print_r($copertina); exit;

		$listaCopertine[] = $copertina;
	}

	return $listaCopertine;
}
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
