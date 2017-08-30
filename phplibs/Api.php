<?php
/**
 * Include 
 */
require_once("./phplibs/GestioneLingua.php");

define("API_DEFAULT", 0 );
define("API_POPUP", 1 );
define("API_NOSTRUCT", 2 );
/**
 * Class definition
 */
class Api {
	/**
	 *	Risolve il dizionario e scrive il template
	 *	@param Context $hCtx Il contesto
	 *	@param boolean $fShadow flag per la visualizzazione dell'output, se true il risultato viene ritornato in un buffer
	 */
	static function risolviDizionario (&$hCtx) {
		$smarty = &$hCtx->smarty;
		GestioneLingua::caricaDizionario($smarty, "Generali");
	}
	/**
	 *	Monta la struttura standard dell'applicazione
	 *
	 *	@param Context $hCtx Il contesto
	 *	@param SessionContext $hSessionCtx Il contesto della sessione
	 *	@param Object $modulo riferimento al modulo
	 */
	static function visualizzaPagina(&$hCtx, &$hSessionCtx, $modulo, $struct = false, $fShadow = false ) {
		$smarty = &$hCtx->smarty;

		if ($struct == false) {
			$struct = $hSessionCtx->getStructDaUsare();
		}

		$smarty->assign("paginaDaVisualizzare", $modulo->getPaginaDaMostrare());

		// echo "<pre>"; print_r($_REQUEST); // exit;

		// echo "<pre>"; print_r($hCtx->aRequest); exit;
		// phpinfo();
		if ($_REQUEST["coockieAccettato"] == 1) {
			$_SESSION["messaggioCoockie"] = "disattivato";
		}

		if (isset($_SESSION["messaggioCoockie"]) == false || $_SESSION["messaggioCoockie"] != "disattivato") {
			$smarty->assign("mostraAvvisoCookie", true);
		} else {
			$smarty->assign("mostraAvvisoCookie", false);
		}

		Api::risolviDizionario($hCtx);

		$buffer = $smarty->fetch($struct);
		if ($fShadow == false) {
			echo $buffer;
		}
		return $buffer;
	}
	/**
	 *	Monta la struttura standard dell'applicazione
	 *	@param Context $hCtx Il contesto
	 */
	static function interfacciaNormale(&$hCtx, &$hSessionCtx) {
		$smarty = &$hCtx->smarty;

		GestioneLingua::caricaDizionario($smarty, "Menu");

		$smarty->assign("codiceLinguaItaliano", Lingue::IT);
		$smarty->assign("codiceLinguaInglese", Lingue::EN);
		$smarty->assign("codiceLinguaEbraica", Lingue::ABJAD);

		// $hSessionCtx->setStructDaUsare("strutturaDiBase.tpl");
	}
	/**
	 *	Compone l'interfaccia principale
	 *	@param Context $hCtx Il contesto
	 *	@param int $nNoStruct switch per la composizione delle interfacce previste ( es: normale, popup ).
	 */
	static function building(&$hCtx, &$hSessionCtx, $tipoStruttura = "") {

		switch ($tipoStruttura) {
		default:
			API::interfacciaNormale($hCtx, $hSessionCtx);
			break;
		}

		return true;
	}

	static function voceMenuSelezionata($hCtx, $voceMenuSelezionata) {
		$smarty = &$hCtx->smarty;

		$smarty->assign("voceMenuSelezionataHome", false);
		$smarty->assign("voceMenuSelezionataAzienda", false);
		$smarty->assign("voceMenuSelezionataDomotica", false);
		$smarty->assign("voceMenuSelezionataConsulenza", false);
		$smarty->assign("voceMenuSelezionataServizi", false);
		$smarty->assign("voceMenuSelezionataTCM", false);
		$smarty->assign("voceMenuSelezionataContatti", false);

		switch ($voceMenuSelezionata) {
		case "home":
			$smarty->assign("voceMenuSelezionataHome", true);
			break;
		case "azienda":
			$smarty->assign("voceMenuSelezionataAzienda", true);
			break;
		case "domotica":
			$smarty->assign("voceMenuSelezionataDomotica", true);
			break;
		case "consulenza":
			$smarty->assign("voceMenuSelezionataConsulenza", true);
			break;
		case "servizi":
			$smarty->assign("voceMenuSelezionataServizi", true);
			break;
		case "tcm":
			$smarty->assign("voceMenuSelezionataTCM", true);
			break;
		case "contatti":
			$smarty->assign("voceMenuSelezionataContatti", true);
			break;
		default:
			$smarty->assign("voceMenuSelezionataHome", true);
			break;
		}
	}
}//End class
?>
