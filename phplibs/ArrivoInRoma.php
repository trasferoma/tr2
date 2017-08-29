<?php
require_once("./phplibs/framework/BaseClass.php");
require_once("./phplibs/framework/Utility.php");
require_once("./phplibs/framework/UtilityPerFileSystem.php");
require_once("./phplibs/enumerazioni/FasiArriviInRoma.php");
require_once("./phplibs/enumerazioni/FasiPartenzeDaRoma.php");
require_once ("db/StruttureDb.php");
require_once ("db/VoliPiuOrariDb.php");
require_once ("pojo/Arrivo.php");
require_once ("CaricatoreDomini.php");

/**
 *	PHP CLASS DEFINITION
 */
/**
 * Definizione della classe di contesto
 * @package formazione
 */
class ArrivoInRoma extends BaseClass {
	var $modulo = "arrivoInRoma";
	/** *************************************************** */
	function ArrivoInRoma(&$hCtx, &$hSessionCtx) {
		$this->BaseClass($hCtx, $hSessionCtx, $this->modulo);
		$this->controlloFlusso();
	}

	/** *************************************************** */
	public function controlloFlusso() {
		switch ($_REQUEST["operazione"]) {
            case "passoC":
                $this->consolePasseggeri();
                break;
            case "salvaPassoB":
                $this->salvaVoloPiuOrario();
                break;
            case "passoB":
                $this->consoleVoliPiuOrari();
                break;
            case "salvaPassoA":
                $this->salvaDatoPiuStruttura();
                break;
			case "passoA":
				$this->consoleDataPiuStruttura();
				break;
			default:
				$this->inizializzazione();
				break;
		}
	}
	/** *************************************************** */
	private function consoleDataPiuStruttura() {
		$smarty = &$this->smarty;

		GestioneLingua::caricaDizionario($smarty, "BookShuttle_ArrivoInRoma");

		CaricatoreDomini::listaStrutture($this->hCtx, $smarty, "strutture");

		$this->settaDatiDiBasePerLaVista();

       $arrivo = $this->getArrivo();

        if ($arrivo != null) {
            $smarty->assign("dataDiArrivo", $arrivo->getData());
            $smarty->assign("strutturaSelezionata", $arrivo->getStruttura());
		}

		$smarty->assign("prossimoPasso", "salvaPassoA");
		$this->setPaginaDaMostrare($smarty->fetch('bookShuttle/arrivoInRoma/selezioneDataPiuStruttura.tpl'));
	}

    /** *************************************************** */
    private function consoleVoliPiuOrari() {
        $smarty = &$this->smarty;

        GestioneLingua::caricaDizionario($smarty, "BookShuttle_ArrivoInRoma");

        $arrivo = $this->getArrivo();

        CaricatoreDomini::listaVoliPiuOrari($this->hCtx, $smarty, "voliPiuOrari", $arrivo->getStruttura());

        $this->settaDatiDiBasePerLaVista();


        //echo "<pre>"; print_r($arrivo); exit;

        if ($arrivo != null) {
            $smarty->assign("voloPiuOrarioSelezionato", $arrivo->getVoloPiuOrario());
        }

		$smarty->assign("moduloCodificato", urlencode($this->modulo));
		$smarty->assign("tokenCodificato", $_REQUEST["token"]);
		$smarty->assign("passoPrecedente", "passoA");
        $smarty->assign("prossimoPasso", "salvaPassoB");

        $this->setPaginaDaMostrare($smarty->fetch('bookShuttle/arrivoInRoma/selezioneVoliPiuOrari.tpl'));
    }

    /** *************************************************** */
    private function consolePasseggeri() {
        $smarty = &$this->smarty;

        GestioneLingua::caricaDizionario($smarty, "BookShuttle_ArrivoInRoma");

        $arrivo = $this->getArrivo();

        // CaricatoreDomini::listaVoliPiuOrari($this->hCtx, $smarty, "voliPiuOrari", $arrivo->getStruttura());

        $this->settaDatiDiBasePerLaVista();

        if ($arrivo != null) {
            $smarty->assign("voloPiuOrario", $arrivo->getVoloPiuOrario);
        }

        $smarty->assign("moduloCodificato", urlencode($this->modulo));
        $smarty->assign("tokenCodificato", $_REQUEST["token"]);
        $smarty->assign("passoPrecedente", "passoB");
        $smarty->assign("prossimoPasso", "salvaPassoC");

        $this->setPaginaDaMostrare($smarty->fetch('bookShuttle/arrivoInRoma/selezionePasseggeri.tpl'));
    }


    /**
	 * - crea la chiave
     * - istanzia l'oggetto contenitore
     * - ridirige al prmo passo di compilazione
     */
    private function inizializzazione()
    {

        $token = bin2hex(openssl_random_pseudo_bytes(16));
        $arrivo = new Arrivo();

        $_SESSION[$token] = $arrivo;

        $this->vaiDataPiuStruttura($token);
        exit;

    }

    private function settaDatiDiBasePerLaVista()
    {
        $smarty = &$this->smarty;

        $smarty->assign("token", $_REQUEST["token"]);
        $smarty->assign("modulo", $this->modulo);
    }

    /**
     *  Valida dati
	 * 	Mostra errore oppure
	 *
	 *  Colleziona le informazioni validate
	 *  Vai al passo successivo
     */
    private function salvaDatoPiuStruttura()
    {
		$datiValidi = $this->validazioneFormDataPiuStruttura();

		if ($datiValidi) {
			$arrivo = $this->getArrivo();
			$arrivo->setData($_REQUEST["dataArrivo"]);
            $arrivo->setStruttura($_REQUEST["struttura"]);

            $this->vaiVoliPiuOrari($_REQUEST["token"]);
		} else {
            $this->vaiDataPiuStruttura($_REQUEST["token"]);
		}
    }

    /**
     *  Valida dati
     * 	Mostra errore oppure
     *
     *  Colleziona le informazioni validate
     *  Vai al passo successivo
     */
    private function salvaVoloPiuOrario()
    {
        $datiValidi = $this->validazioneFormVoloPiuOrario();

        if ($datiValidi) {
            $arrivo = $this->getArrivo();
            $arrivo->setVoloPiuOrario($_REQUEST["voloPiuOrario"]);

            $this->vaiPasseggeri($_REQUEST["token"]);
        } else {
            $this->vaiVoliPiuOrari($_REQUEST["token"]);
        }
    }

    private function getArrivo()
    {
    	$token = $_REQUEST["token"];

    	if (isset($_SESSION[$token])) {
    		return $_SESSION[$token];
		} else {
    		return null;
		}

    }

    private function vaiDataPiuStruttura($token)
    {
    	$tokenCodificato = urlencode ($token);
        $indirizzo = sprintf("index.php?m=%s&operazione=passoA&token=%s", $this->modulo, $tokenCodificato);

        header("Location: $indirizzo");
        exit;
    }

    private function vaiVoliPiuOrari($token)
    {
        $tokenCodificato = urlencode ($token);
        $indirizzo = sprintf("index.php?m=%s&operazione=passoB&token=%s", $this->modulo, $tokenCodificato);

        header("Location: $indirizzo");
        exit;
    }

    private function vaiPasseggeri($token)
    {
        $tokenCodificato = urlencode ($token);
        $indirizzo = sprintf("index.php?m=%s&operazione=passoC&token=%s", $this->modulo, $tokenCodificato);

        header("Location: $indirizzo");
        exit;
    }


    private function validazioneFormDataPiuStruttura()
    {
		require_once ("validazione/ValidazioneFormArrivoDataPiuStruttura.php");

		$validatore = new ValidazioneFormArrivoDataPiuStruttura();

		return $validatore->datiValidi();
    }

    private function validazioneFormVoloPiuOrario()
    {
        require_once ("validazione/ValidazioneFormArrivoVoloPiuOrario.php");

        $validatore = new ValidazioneFormArrivoVoloPiuOrario();

        return $validatore->datiValidi();
    }


    /** *************************************************** */
} //End of class definition.
?>
