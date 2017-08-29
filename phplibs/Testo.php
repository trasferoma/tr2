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
class Testo extends BaseClass {
/** *************************************************** */
function Testo(&$hCtx, &$hSessionCtx) {
	$this->BaseClass($hCtx, $hSessionCtx, "testo");
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

    $this->setPaginaDaMostrare($smarty->fetch('testo.tpl'));
}
/** *************************************************** */
} //End of class definition.
?>
