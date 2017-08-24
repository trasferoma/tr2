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
class Bottoni extends BaseClass {
/** *************************************************** */
function Bottoni(&$hCtx, &$hSessionCtx, $fNoWork=false ) {
	$this->BaseClass($hCtx, $hSessionCtx, "bottoni");
	$this->controlloFlusso();
}
/** *************************************************** */
public function controlloFlusso() {
	$smarty = &$this->smarty;
	$aParam   = $this->aParam;

	// Api::voceMenuSelezionata($this->hCtx, "home");

	switch ($aParam["operazione"]) {
	default:
		$this->pagina();
		break;
	}
}
/** *************************************************** */
private function pagina() {
	$smarty = &$this->smarty;
	$aParam = $this->aParam;

    GestioneLingua::caricaDizionario($smarty, "Home");

	$this->setPaginaDaMostrare($smarty->fetch('bottoni.tpl'));
}
/** *************************************************** */
} //End of class definition.
?>
