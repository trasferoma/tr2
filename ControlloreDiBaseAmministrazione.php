<?php //header('Content-Type: text/html; charset=utf-8');?>
<?php
/**
 *	PHP INCLUDE 
 */
require_once("./phplibs/cfg.php");
require_once("./Smarty/libs/Smarty.class.php");
require_once("./phplibs/framework/Utility.php");
require_once("./phplibs/framework/SessionContext.php");
require_once("./phplibs/framework/Context.php");
require_once("./phplibs/Api.php");
require_once("./phplibs/strumenti/StrumentiAmministrazione.php");

/**
 *	PHP SPECIFIC GLOBAL VARIABLES
 */
/**
 *	Classe pagina principale
 */
class ControlloreDiBaseAmministrazione {
	var $smarty;
/** ***************************************************************** */
/**
 *	Costruttorex
 */
function ControlloreDiBaseAmministrazione ($fDB=true, $fFastT=true) {
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

/**
 *	Gestore delle attivita'
 */
function controlloFlusso($modulo) {

	Api::building($this->hCtx, $this->hSessionCtx, $_REQUEST["tipoStruttura"]);

	// echo "-"; echo Utility::cookieGet("linguaImpostata", ""); echo "-";

    if ($modulo != "login") {
    	StrumentiAmministrazione::vaiLoginSeNonLoggato();
    }

	switch ($modulo) {
        case "shuttle":
            $_SERVER["QUERY_STRING"] = "m=shuttle";
            require_once("./phplibs/amministrazione/controllori/Shuttle.php");
            $this->currMod = new Shuttle($this->hCtx, $this->hSessionCtx);
            break;
        case "mezziPiuOrari":
            $_SERVER["QUERY_STRING"] = "m=mezziPiuOrari";
            require_once("./phplibs/amministrazione/controllori/MezziPiuOrari.php");
            $this->currMod = new MezziPiuOrari($this->hCtx, $this->hSessionCtx);
            break;
        case "strutture":
            $_SERVER["QUERY_STRING"] = "m=strutture";
            require_once("./phplibs/amministrazione/controllori/Strutture.php");
            $this->currMod = new Strutture($this->hCtx, $this->hSessionCtx);
            break;
        case "home":
            $_SERVER["QUERY_STRING"] = "m=home";
            require_once("./phplibs/amministrazione/controllori/Home.php");
            $this->currMod = new Home($this->hCtx, $this->hSessionCtx);
        	break;
		case "login":
		default:
			$_SERVER["QUERY_STRING"] = "m=login";
			require_once("./phplibs/amministrazione/controllori/Login.php");
			$this->currMod = new Login($this->hCtx, $this->hSessionCtx);
			break;
	}

	$this->debug(false);

	if ($this->currMod->isPaginaDaMostrare()) {
		Api::visualizzaPagina($this->hCtx, $this->hSessionCtx, $this->currMod, "strutturaDiBaseAmministrazione.tpl", false, true);
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
