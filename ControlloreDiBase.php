<?php //header('Content-Type: text/html; charset=utf-8');?>
<?php
/**
 *	PHP INCLUDE 
 */
require_once("./phplibs/cfg.php");
require_once("./Smarty/libs/Smarty.class.php");
require_once("./Smarty/libs/SmartyPaginate.class.php");
require_once("./phplibs/framework/Utility.php");
require_once("./phplibs/framework/SessionContext.php");
require_once("./phplibs/framework/Context.php");
require_once("./phplibs/Api.php");

/**
 *	PHP SPECIFIC GLOBAL VARIABLES
 */
/**
 *	Classe pagina principale
 */
class ControlloreDiBase {
	var $smarty;
/** ***************************************************************** */
/**
 *	Costruttorex
 */
function ControlloreDiBase ($fDB=true, $fFastT=true) {
	$this->hCtx = new Context($fDB, $fFastT);

	if( $fDB && $this->hCtx->isDBOnLine() == false ) {
		printf("ERRORE Database non in linea");
		exit;
	}
	if( $fFastT && $this->hCtx->isFastTOnLine() == false ) {
		printf("ERRORE FastTemplates non in linea");
		exit;
	}

	if ($fFastT) {
		$this->hCtx->smarty->compile_check = true;
		$this->hCtx->smarty->debugging = false;
	}
}
/** *************************************************** */
/**
 *	Ricarica la pagina precedente.
 */
function ricaricaPaginaPrecedente($default) {
	$urlPrecedente = $_SERVER["HTTP_REFERER"];

	if ($urlPrecedente == "") {
		$urlPrecedente = $default;
	}

	Utility::redirect($urlPrecedente);

	exit;
}
/** *************************************************** */
/**
 *	Gestore delle attivita'
 */
function controlloFlusso($modulo) {

	$smarty = &$this->hCtx->smarty;
	$aParam = $this->hCtx->aRequest;
	$hSessionCtx = &$this->hSessionCtx;

	if ($modulo == "scaricaFile") {
		require_once("./phplibs/ScaricaFile.php");
		new ScaricaFile($this->hCtx, $this->hSessionCtx, $stModKey = "scaricaFile");
		exit;
	}

	if ($modulo == "impostaLingua") {
		require_once("./phplibs/GestioneLingua.php");
		GestioneLingua::impostaLingua($_REQUEST["lingua"]);
		$this->ricaricaPaginaPrecedente("?m=home");
	}

	Api::building($this->hCtx, $this->hSessionCtx, $aParam["tipoStruttura"]);

	// echo "-"; echo Utility::cookieGet("linguaImpostata", ""); echo "-";

	switch ($modulo) {
        case "immagini":
            $_SERVER["QUERY_STRING"] = "m=immagini";
            require_once("./phplibs/Immagini.php");
            $this->currMod = new Immagini($this->hCtx, $this->hSessionCtx);
            break;
        case "form":
            $_SERVER["QUERY_STRING"] = "m=form";
            require_once("./phplibs/Form.php");
            $this->currMod = new Form($this->hCtx, $this->hSessionCtx);
            break;
        case "bottoni":
            $_SERVER["QUERY_STRING"] = "m=bottoni";
            require_once("./phplibs/Bottoni.php");
            $this->currMod = new Bottoni($this->hCtx, $this->hSessionCtx);
            break;
        case "tabelle":
            $_SERVER["QUERY_STRING"] = "m=tabelle";
            require_once("./phplibs/Tabelle.php");
            $this->currMod = new Tabelle($this->hCtx, $this->hSessionCtx);
            break;
        case "testo":
            $_SERVER["QUERY_STRING"] = "m=testo";
            require_once("./phplibs/Testo.php");
            $this->currMod = new Testo($this->hCtx, $this->hSessionCtx);
            break;
        case "liste":
            $_SERVER["QUERY_STRING"] = "m=liste";
            require_once("./phplibs/Liste.php");
            $this->currMod = new Liste($this->hCtx, $this->hSessionCtx);
            break;
		case "bookShuttle":
			$_SERVER["QUERY_STRING"] = "m=bookShuttle";
			require_once("./phplibs/BookShuttle.php");
			$this->currMod = new BookShuttle($this->hCtx, $this->hSessionCtx);
			break;
		case "home":
		default:
			$_SERVER["QUERY_STRING"] = "m=home";
			require_once("./phplibs/Home.php");
			$this->currMod = new Home($this->hCtx, $this->hSessionCtx);
			break;
	}

	$this->debug(false);

	if ($this->currMod->isPaginaDaMostrare()) {
		Api::visualizzaPagina($this->hCtx, $this->hSessionCtx, $this->currMod, "strutturaDiBase.tpl");
	}
}
/** ***************************************************************** */
/**
 *	Distruttore
 */
function destroy(){
}
/** 
*/
/** ***************************************************************** */
/**
 *	Attiva disattiva il debug
 */
function debug($f) {
	$smarty = &$this->hCtx->smarty;
	$hCtx = &$this->hCtx;
	$hSessionCtx = &$this->hSessionCtx;

	if ($f) {
		$smarty->define	( array	( "debug"	=> "templates/debug.tpl") );
		$hCtx->aRequest["debug"] = 1;
		$smarty->assign("LINGUA_IMPOSTATA_ID_DEBUG", "1");
		$smarty->assign("LINGUA_IMPOSTATA_ABBREV_DEBUG", "IT");
		//unset($hSessionCtx->urlIndietro);
		$smarty->assign("STACK_INDIETRO", $hSessionCtx->debugMostraStack());
		$hCtx->aRequest["debug"] = 1;
		$smarty->parse("internalDebug", "debug");
	} else {
		$smarty->assign("internalDebug", "x");
	}
}
}//end class

/** ***************************************************************** */
/**
 * MAIN
 */
/*
function getmicrotime()
{ 
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

$timeStart = getmicrotime();
 
session_start();
$hPage = new Index($fDB=true, $fFastT=true, $fDict=false);
$hPage->controlloFlusso();

$timeEnd = getmicrotime();
$timeDiff = round($timeEnd - $timeStart, 3);
if ($hPage->hCtx->aRequest["debug"] == 1) {
	echo "Elab time: {$timeDiff} seconds";
}

$hPage->destroy();
*/
?>
