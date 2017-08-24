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
class Form extends BaseClass {
/** *************************************************** */
function Form(&$hCtx, &$hSessionCtx, $fNoWork=false ) {
	$this->BaseClass($hCtx, $hSessionCtx, "form");
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

	$this->setPaginaDaMostrare($smarty->fetch('form.tpl'));
}
/** *************************************************** */
} //End of class definition.
?>
