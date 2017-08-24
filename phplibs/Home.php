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
class Home extends BaseClass {
/** *************************************************** */
function Home(&$hCtx, &$hSessionCtx, $fNoWork=false ) {
	$this->BaseClass($hCtx, $hSessionCtx, "home");
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

    /*
    require_once ("db/UtentiDb.php");
    UtentiDb::aggiungiUtente($this->hCtx);
    */

    $this->setPaginaDaMostrare($smarty->fetch('home.tpl'));
}
/** *************************************************** */
} //End of class definition.
?>
