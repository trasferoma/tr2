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
class BookShuttle extends BaseClass {
/** *************************************************** */
function BookShuttle(&$hCtx, &$hSessionCtx) {
	$this->BaseClass($hCtx, $hSessionCtx, "bookShuttle");
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

	$this->setPaginaDaMostrare($smarty->fetch('bookShuttle.tpl'));
}
/** *************************************************** */
} //End of class definition.
?>
