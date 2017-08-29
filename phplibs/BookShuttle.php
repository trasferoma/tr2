<?php
require_once("./phplibs/framework/BaseClass.php");
require_once("./phplibs/framework/Utility.php");
require_once("./phplibs/framework/UtilityPerFileSystem.php");
require_once("./phplibs/enumerazioni/FasiArriviInRoma.php");
require_once("./phplibs/enumerazioni/FasiPartenzeDaRoma.php");

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
	switch ($_REQUEST["operazione"]) {
		case "sceltaTipoTrasferimento":
		default:
			$this->sceltaTipoTrasferimento();
			break;
	}
}
/** *************************************************** */
private function sceltaTipoTrasferimento() {
	$smarty = &$this->smarty;

    GestioneLingua::caricaDizionario($smarty, "BookShuttle_SceltaTipoTrasferimento");

    /*
    $smarty->assign("faseSuccessivaArrivoInRoma", FasiArriviInRoma::SceltaStrutturaDiArrivo);
    $smarty->assign("faseSuccessivaPartenzaDaRoma", FasiPartenzeDaRoma::InserimentoIndirizzoDiPartenza);
	*/

	$this->setPaginaDaMostrare($smarty->fetch('bookShuttle/sceltaTipoTrasferimento.tpl'));
}
/** *************************************************** */
} //End of class definition.
?>
