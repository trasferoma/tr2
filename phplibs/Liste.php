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
class Liste extends BaseClass {
/** *************************************************** */
function Liste(&$hCtx, &$hSessionCtx) {
	$this->BaseClass($hCtx, $hSessionCtx, "liste");
	$this->controlloFlusso();
}
/** *************************************************** */
public function controlloFlusso() {
	$smarty = &$this->smarty;
	$aParam   = $this->aParam;

	// Api::voceMenuSelezionata($this->hCtx, "bookShuttle");

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

	$this->setPaginaDaMostrare($smarty->fetch('liste.tpl'));
}
/** *************************************************** */
} //End of class definition.
?>
