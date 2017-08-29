<?php
require_once("./phplibs/framework/BaseClass.php");
require_once("./phplibs/framework/Utility.php");
require_once("./phplibs/framework/UtilityPerFileSystem.php");
/**
 *	PHP CLASS DEFINITION
 */
/**
 * Definizione della classe di contesto
 * @package formazione
 */
class Immagini extends BaseClass {
/** *************************************************** */
function Immagini(&$hCtx, &$hSessionCtx, $fNoWork=false ) {
	$this->BaseClass($hCtx, $hSessionCtx, "immagini");
	$this->controlloFlusso();
}
/** *************************************************** */
public function controlloFlusso() {
	switch ($_REQUEST["operazione"]) {
	default:
		$this->pagina();
		break;
	}
}
/** *************************************************** */
private function pagina() {
	$smarty = &$this->smarty;
	GestioneLingua::caricaDizionario($smarty, "Home");

    $this->setPaginaDaMostrare($smarty->fetch('immagini.tpl'));
}
/** *************************************************** */
} //End of class definition.
?>
