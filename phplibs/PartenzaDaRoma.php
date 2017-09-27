<?php
require_once("./phplibs/framework/BaseClass.php");
require_once("./phplibs/framework/Utility.php");
require_once("./phplibs/framework/UtilityPerFileSystem.php");
// require_once("./phplibs/enumerazioni/FasiArriviInRoma.php");
require_once("./phplibs/enumerazioni/FasiPartenzeDaRoma.php");
require_once("./phplibs/db/StruttureDb.php");
require_once("./phplibs/db/MezziPiuOrariDb.php");
require_once("./phplibs/db/PrenotazioniDb.php");
require_once("./phplibs/pojo/Partenza.php");
require_once("./phplibs/CaricatoreDomini.php");
require_once("./phplibs/GestorePrenotazione.php");

/**
 *	PHP CLASS DEFINITION
 */
/**
 * Definizione della classe di contesto
 * @package formazione
 */
class PartenzaDaRoma extends BaseClass {
    var $modulo = "partenzaDaRoma";
    /** *************************************************** */
    function PartenzaDaRoma(&$hCtx, &$hSessionCtx) {
        $this->BaseClass($hCtx, $hSessionCtx, $this->modulo);
        $this->controlloFlusso();
    }

    /** *************************************************** */
    public function controlloFlusso() {
        switch ($_REQUEST["operazione"]) {
            case "finePrenotazione":
                $this->finePrenotazione();
                break;
            case "prenota":
                $this->prenota();
                break;
            case "passoD":
                $this->riepilogoPrenotazione();
                break;
            case "salvaPassoC":
                $this->salvaPasseggeri();
                break;
            case "passoC":
                $this->consolePasseggeri();
                break;
            case "salvaPassoB":
                $this->salvaMezzoPiuOrario();
                break;
            case "passoB":
                $this->consoleMezziPiuOrari();
                break;
            case "salvaPassoA":
                $this->salvaDataPiuStruttura();
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

        $this->controlloSessioneValida();

        GestioneLingua::caricaDizionario($smarty, "BookShuttle_PartenzaDaRoma");

        CaricatoreDomini::listaStrutture($this->hCtx, $smarty, "strutture");

        $this->settaDatiDiBasePerLaVista();

        $viaggio = $this->getPartenza();

        // echo "<pre>"; print_r($partenza); exit;

        if ($viaggio != null) {
            $smarty->assign("dataDiPartenza", $viaggio->getData());
            $smarty->assign("strutturaSelezionata", $viaggio->getStruttura());
        }

        $smarty->assign("prossimoPasso", "salvaPassoA");
        $this->setPaginaDaMostrare($smarty->fetch('bookShuttle/partenzaDaRoma/selezioneDataPiuStruttura.tpl'));
    }

    /** *************************************************** */
    private function consoleMezziPiuOrari() {
        $smarty = &$this->smarty;

        $this->controlloSessioneValida();

        GestioneLingua::caricaDizionario($smarty, "BookShuttle_PartenzaDaRoma");

        $viaggio = $this->getPartenza();

        CaricatoreDomini::listaMezziPiuOrariInPartenza($this->hCtx, $smarty, "mezziPiuOrari", $viaggio->getStruttura());

        $this->settaDatiDiBasePerLaVista();

        //echo "<pre>"; print_r($viaggio); exit;

        if ($viaggio != null) {
            $smarty->assign("mezzoPiuOrarioSelezionato", $viaggio->getMezzoPiuOrario());
            $smarty->assign("indirizzoRaccoltaShuttle", $viaggio->getIndirizzoRaccoltaShuttle());
        }

        $smarty->assign("moduloCodificato", urlencode($this->modulo));
        $smarty->assign("tokenCodificato", $_REQUEST["token"]);
        $smarty->assign("passoPrecedente", "passoA");
        $smarty->assign("prossimoPasso", "salvaPassoB");

        $this->setPaginaDaMostrare($smarty->fetch('bookShuttle/partenzaDaRoma/selezioneMezziPiuOrari.tpl'));
    }

    /** *************************************************** */
    private function consoleDestinazioneShuttle() {
        $smarty = &$this->smarty;

        $this->controlloSessioneValida();

        GestioneLingua::caricaDizionario($smarty, "BookShuttle_PartenzaDaRoma");

        $viaggio = $this->getPartenza();

        $this->settaDatiDiBasePerLaVista();

        // echo "<pre>"; print_r($viaggio); exit;

        if ($viaggio != null) {
            $smarty->assign("nomeDestinazione", $viaggio->getNomeDestinazione());
            $smarty->assign("indirizzoDestinazione", $viaggio->getIndirizzoDestinazione());
        }

        $smarty->assign("moduloCodificato", urlencode($this->modulo));
        $smarty->assign("tokenCodificato", $_REQUEST["token"]);
        $smarty->assign("passoPrecedente", "passoC");
        $smarty->assign("prossimoPasso", "salvaPassoD");

        $this->setPaginaDaMostrare($smarty->fetch('bookShuttle/partenzaDaRoma/selezioneRaccoltaShuttle.tpl'));
    }

    /** *************************************************** */
    private function consolePasseggeri() {
        $smarty = &$this->smarty;

        $this->controlloSessioneValida();

        GestioneLingua::caricaDizionario($smarty, "BookShuttle_PartenzaDaRoma");

        $viaggio = $this->getPartenza();

        $this->settaDatiDiBasePerLaVista();

        if ($viaggio != null) {
            $smarty->assign("numeroAdulti", $viaggio->getNumeroAdulti());
            $smarty->assign("numeroAnimali", $viaggio->getNumeroAnimali());
            $smarty->assign("numeroBambiniAnni3Anni6", $viaggio->getNumeroBambiniDa3A6());
            $smarty->assign("numeroBambiniAnni6Anni12", $viaggio->getNumeroBambiniDa6A12());
            $smarty->assign("cellulareContatto", $viaggio->getCellulareContatto());
            $smarty->assign("nomeContatto", $viaggio->getNomeContatto());
            $smarty->assign("cognomeContatto", $viaggio->getCognomeContatto());
            $smarty->assign("emailContatto", $viaggio->getEmailContatto());
        }

        $smarty->assign("moduloCodificato", urlencode($this->modulo));
        $smarty->assign("tokenCodificato", $_REQUEST["token"]);
        $smarty->assign("passoPrecedente", "passoB");
        $smarty->assign("prossimoPasso", "salvaPassoC");

        $this->setPaginaDaMostrare($smarty->fetch('bookShuttle/partenzaDaRoma/selezionePasseggeri.tpl'));
    }

    /** *************************************************** */
    private function riepilogoPrenotazione() {
        $smarty = &$this->smarty;

        $this->controlloSessioneValida();

        GestioneLingua::caricaDizionario($smarty, "BookShuttle_PartenzaDaRoma");

        $viaggio = $this->getPartenza();

        $this->settaDatiDiBasePerLaVista();

        $descrizioneStruttura = $this->getDescrizioneStruttura();
        $descrizioneMezzoPiuOrario = $this->getDescrizioneMezzoPiuOrario();

        $smarty->assign("data", $viaggio->getData());
        $smarty->assign("struttura", $descrizioneStruttura);
        $smarty->assign("mezzoPiuOrario", $descrizioneMezzoPiuOrario);
        $smarty->assign("numeroAdulti", $viaggio->getNumeroAdulti());
        $smarty->assign("numeroAnimali", $viaggio->getNumeroAnimali());
        $smarty->assign("numeroBambiniDa3A6", $viaggio->getNumeroBambiniDa3A6());
        $smarty->assign("numeroBambiniDa6A12", $viaggio->getNumeroBambiniDa6A12());
        $smarty->assign("nomeContatto", $viaggio->getNomeContatto());
        $smarty->assign("cognomeContatto", $viaggio->getCognomeContatto());
        $smarty->assign("emailContatto", $viaggio->getEmailContatto());
        $smarty->assign("cellulareContatto", $viaggio->getCellulareContatto());

        // $smarty->assign("nomeDestinazioneShuttle", $viaggio->getNomeDestinazione());
        $smarty->assign("indirizzoDestinazioneShuttle", $viaggio->getIndirizzoDestinazione());

        $smarty->assign("moduloCodificato", urlencode($this->modulo));
        $smarty->assign("tokenCodificato", $_REQUEST["token"]);
        $smarty->assign("passoPrecedente", "passoC");
        $smarty->assign("prossimoPasso", "prenota");

        $this->setPaginaDaMostrare($smarty->fetch('bookShuttle/partenzaDaRoma/riepilogo.tpl'));
    }

    private function getDescrizioneStruttura() {
        $viaggio = $this->getPartenza();
        $linguaImpostata = GestioneLingua::getLinguaImpostata();
        $struttura = StruttureDb::getStrutturaByID($this->hCtx, $viaggio->getStruttura(), $linguaImpostata);

        return $struttura["descrizione"];
    }

    /**
     * - crea la chiave
     * - istanzia l'oggetto contenitore
     * - ridirige al prmo passo di compilazione
     */
    private function inizializzazione()
    {

        $token = bin2hex(openssl_random_pseudo_bytes(16));
        $partenza = new Partenza();

        $_SESSION[$token] = $partenza;

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
    private function salvaDataPiuStruttura()
    {
        $this->controlloSessioneValida();

        $datiValidi = $this->validazioneFormDataPiuStruttura();

        if ($datiValidi) {
            $viaggio = $this->getPartenza();
            $viaggio->setData($_REQUEST["dataDiPartenza"]);
            $viaggio->setStruttura($_REQUEST["struttura"]);

            $this->vaiMezziPiuOrari($_REQUEST["token"]);
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
    private function salvaMezzoPiuOrario()
    {
        $this->controlloSessioneValida();

        $datiValidi = $this->validazioneFormMezzoPiuOrario();

        if ($datiValidi) {
            $viaggio = $this->getPartenza();
            $viaggio->setMezzoPiuOrario($_REQUEST["mezzoPiuOrario"]);
            $viaggio->setIndirizzoRaccoltaShuttle($_REQUEST["indirizzoRaccoltaShuttle"]);

            $this->vaiPasseggeri($_REQUEST["token"]);
        } else {
            $this->vaiMezziPiuOrari($_REQUEST["token"]);
        }
    }

    /**
     *  Valida dati
     * 	Mostra errore oppure
     *
     *  Colleziona le informazioni validate
     *  Vai al passo successivo
     */
    private function salvaPasseggeri()
    {
        $this->controlloSessioneValida();

        $datiValidi = $this->validazioneFormPasseggeri();

        if ($datiValidi) {
            $viaggio = $this->getPartenza();

            $viaggio->setNumeroAdulti($_REQUEST["numeroAdulti"]);
            $viaggio->setNumeroAnimali($_REQUEST["numeroAnimali"]);
            $viaggio->setNumeroBambiniDa3A6($_REQUEST["numeroBambiniAnni3Anni6"]);
            $viaggio->setNumeroBambiniDa6A12($_REQUEST["numeroBambiniAnni6Anni12"]);
            $viaggio->setNomeContatto($_REQUEST["nomeContatto"]);
            $viaggio->setCognomeContatto($_REQUEST["cognomeContatto"]);
            $viaggio->setEmailContatto($_REQUEST["emailContatto"]);
            $viaggio->setCellulareContatto($_REQUEST["cellulareContatto"]);

            // $this->vaiRiepilogo($_REQUEST["token"]);
            $this->vaiDestinazioneShuttle($_REQUEST["token"]);
        } else {
            $this->vaiPasseggeri($_REQUEST["token"]);
        }
    }

    /**
     *  Valida dati
     * 	Mostra errore oppure
     *
     *  Colleziona le informazioni validate
     *  Vai al passo successivo
     */
    private function salvaDestinazioneShuttle()
    {
        $this->controlloSessioneValida();

        $datiValidi = $this->validazioneFormDestinazioneShuttle();

        if ($datiValidi) {
            $viaggio = $this->getPartenza();

            $viaggio->setNomeDestinazione($_REQUEST["nomeDestinazioneShuttle"]);
            $viaggio->setIndirizzoDestinazione($_REQUEST["indirizzoDestinazioneShuttle"]);

            $this->vaiRiepilogo($_REQUEST["token"]);
        } else {
            $this->vaiDestinazioneShuttle($_REQUEST["token"]);
        }
    }

    private function prenota()
    {
        $viaggio = $this->getPartenza();

        $this->controlloSessioneValida();

        $gestorePrenotazione = new GestorePrenotazione();
        $gestorePrenotazione->aggiungiPrenotazioneDiArrivoInRoma($this->hCtx, $viaggio);

        $token = $_REQUEST["token"];
        unset($_SESSION[$token]);

        $this->vaiFinePrenotazione();
    }

    private function getPartenza()
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

    private function vaiMezziPiuOrari($token)
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

    private function vaiDestinazioneShuttle($token)
    {
        $tokenCodificato = urlencode ($token);
        $indirizzo = sprintf("index.php?m=%s&operazione=passoD&token=%s", $this->modulo, $tokenCodificato);

        header("Location: $indirizzo");
        exit;
    }

    private function vaiRiepilogo($token)
    {
        $tokenCodificato = urlencode ($token);
        $indirizzo = sprintf("index.php?m=%s&operazione=passoE&token=%s", $this->modulo, $tokenCodificato);

        header("Location: $indirizzo");
        exit;
    }

    private function validazioneFormDataPiuStruttura()
    {
        require_once ("validazione/ValidazioneFormPartenzaDataPiuStruttura.php");

        $validatore = new ValidazioneFormPartenzaDataPiuStruttura();

        return $validatore->datiValidi();
    }

    private function validazioneFormMezzoPiuOrario()
    {
        require_once ("validazione/ValidazioneFormPartenzaMezzoPiuOrario.php");

        $validatore = new ValidazioneFormPartenzaMezzoPiuOrario();

        return $validatore->datiValidi();
    }

    private function validazioneFormPasseggeri()
    {
        require_once ("validazione/ValidazioneFormPasseggeri.php");

        $validatore = new ValidazioneFormPasseggeri();

        return $validatore->datiValidi();
    }

    private function validazioneFormDestinazioneShuttle()
    {
        require_once ("validazione/ValidazioneFormDestinazioneShuttle.php");

        $validatore = new validazioneFormDestinazioneShuttle();

        return $validatore->datiValidi();
    }

    private function controlloSessioneValida()
    {
        $token = $_REQUEST["token"];

        if (isset($_SESSION[$token]) == false) {
            $this->vaiSessioneNonValida();
        }
    }

    private function vaiSessioneNonValida()
    {
        $indirizzo = "index.php?m=sessioneNonValida";

        header("Location: $indirizzo");
        exit;
    }

    private function vaiFinePrenotazione()
    {
        $indirizzo = sprintf("index.php?m=%s&operazione=finePrenotazione", $this->modulo);

        header("Location: $indirizzo");
        exit;
    }
    /** *************************************************** */
    private function finePrenotazione() {
        $smarty = &$this->smarty;

        GestioneLingua::caricaDizionario($smarty, "BookShuttle_PartenzaDaRoma");

        $this->setPaginaDaMostrare($smarty->fetch('bookShuttle/partenzaDaRoma/finePrenotazione.tpl'));
    }

    private function getDescrizioneMezzoPiuOrario()
    {
        $viaggio = $this->getPartenza();
        $linguaImpostata = GestioneLingua::getLinguaImpostata();
        $mezzoPiuOrario = MezziPiuOrariDb::getMezzoPiuOrarioByID($this->hCtx, $viaggio->getMezzoPiuOrario(), $linguaImpostata);

        return $mezzoPiuOrario["descrizione"];

    }

    /** *************************************************** */
} //End of class definition.
?>