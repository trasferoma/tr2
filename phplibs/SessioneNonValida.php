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
class SessioneNonValida extends BaseClass {
/** *************************************************** */
function SessioneNonValida(&$hCtx, &$hSessionCtx, $fNoWork=false ) {
	$this->BaseClass($hCtx, $hSessionCtx, "home");
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

    GestioneLingua::caricaDizionario($smarty, "SessioneNonValida");

    $this->setPaginaDaMostrare($smarty->fetch('sessioneNonValida.tpl'));
}
/** *************************************************** */
} //End of class definition.
?>
