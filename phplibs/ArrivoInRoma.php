<?php
require_once("./phplibs/framework/BaseClass.php");
require_once("./phplibs/framework/Utility.php");
require_once("./phplibs/framework/UtilityPerFileSystem.php");
require_once("./phplibs/enumerazioni/FasiArriviInRoma.php");
require_once("./phplibs/enumerazioni/FasiPartenzeDaRoma.php");
require_once("./phplibs/db/StruttureDb.php");
require_once("./phplibs/db/MezziPiuOrariDb.php");
require_once("./phplibs/db/PrenotazioniDb.php");
require_once("./phplibs/pojo/Arrivo.php");
require_once("./phplibs/CaricatoreDomini.php");
require_once("./phplibs/GestorePrenotazione.php");

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
            case "finePrenotazione":
                $this->finePrenotazione();
                break;
            case "prenota":
                $this->prenota();
                break;
            case "passoD":
                $this->riepilogoPrenotazione();
                break;
            /*
        case "salvaPassoD":
            $this->salvaDestinazioneShuttle();
            break;
        case "passoD":
            $this->consoleDestinazioneShuttle();
            break;
            */
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

        $this->controlloSessioneValida();

        GestioneLingua::caricaDizionario($smarty, "BookShuttle_ArrivoInRoma");

        CaricatoreDomini::listaStrutture($this->hCtx, $smarty, "strutture");

        $this->settaDatiDiBasePerLaVista();

        $arrivo = $this->getArrivo();

        // echo "<pre>"; print_r($arrivo); exit;

        if ($arrivo != null) {
            $smarty->assign("dataDiArrivo", $arrivo->getData());
            $smarty->assign("strutturaSelezionata", $arrivo->getStruttura());
        }

        $smarty->assign("prossimoPasso", "salvaPassoA");
        $this->setPaginaDaMostrare($smarty->fetch('bookShuttle/arrivoInRoma/selezioneDataPiuStruttura.tpl'));
    }

    /** *************************************************** */
    private function consoleMezziPiuOrari() {
        $smarty = &$this->smarty;

        $this->controlloSessioneValida();

        GestioneLingua::caricaDizionario($smarty, "BookShuttle_ArrivoInRoma");

        $arrivo = $this->getArrivo();

        CaricatoreDomini::listaMezziPiuOrariInArrivo($this->hCtx, $smarty, "mezziPiuOrari", $arrivo->getStruttura());

        $this->settaDatiDiBasePerLaVista();

        //echo "<pre>"; print_r($arrivo); exit;

        if ($arrivo != null) {
            $smarty->assign("mezzoPiuOrarioSelezionato", $arrivo->getMezzoPiuOrario());
            $smarty->assign("indirizzoDestinazioneShuttle", $arrivo->getIndirizzoDestinazione());
        }

        $smarty->assign("moduloCodificato", urlencode($this->modulo));
        $smarty->assign("tokenCodificato", $_REQUEST["token"]);
        $smarty->assign("passoPrecedente", "passoA");
        $smarty->assign("prossimoPasso", "salvaPassoB");

        $this->setPaginaDaMostrare($smarty->fetch('bookShuttle/arrivoInRoma/selezioneMezziPiuOrari.tpl'));
    }

    /** *************************************************** */
    private function consoleDestinazioneShuttle() {
        $smarty = &$this->smarty;

        $this->controlloSessioneValida();

        GestioneLingua::caricaDizionario($smarty, "BookShuttle_ArrivoInRoma");

        $arrivo = $this->getArrivo();

        $this->settaDatiDiBasePerLaVista();

        // echo "<pre>"; print_r($arrivo); exit;

        if ($arrivo != null) {
            $smarty->assign("nomeDestinazione", $arrivo->getNomeDestinazione());
            $smarty->assign("indirizzoDestinazione", $arrivo->getIndirizzoDestinazione());
        }

        $smarty->assign("moduloCodificato", urlencode($this->modulo));
        $smarty->assign("tokenCodificato", $_REQUEST["token"]);
        $smarty->assign("passoPrecedente", "passoC");
        $smarty->assign("prossimoPasso", "salvaPassoD");

        $this->setPaginaDaMostrare($smarty->fetch('bookShuttle/arrivoInRoma/selezioneDestinazioneShuttle.tpl'));
    }

    /** *************************************************** */
    private function consolePasseggeri() {
        $smarty = &$this->smarty;

        $this->controlloSessioneValida();

        GestioneLingua::caricaDizionario($smarty, "BookShuttle_ArrivoInRoma");

        $arrivo = $this->getArrivo();

        $this->settaDatiDiBasePerLaVista();

        if ($arrivo != null) {
            $smarty->assign("numeroAdulti", $arrivo->getNumeroAdulti());
            $smarty->assign("numeroAnimali", $arrivo->getNumeroAnimali());
            $smarty->assign("numeroBambiniAnni3Anni6", $arrivo->getNumeroBambiniDa3A6());
            $smarty->assign("numeroBambiniAnni6Anni12", $arrivo->getNumeroBambiniDa6A12());
            $smarty->assign("cellulareContatto", $arrivo->getCellulareContatto());
            $smarty->assign("nomeContatto", $arrivo->getNomeContatto());
            $smarty->assign("cognomeContatto", $arrivo->getCognomeContatto());
            $smarty->assign("emailContatto", $arrivo->getEmailContatto());
        }

        $smarty->assign("moduloCodificato", urlencode($this->modulo));
        $smarty->assign("tokenCodificato", $_REQUEST["token"]);
        $smarty->assign("passoPrecedente", "passoB");
        $smarty->assign("prossimoPasso", "salvaPassoC");

        $this->setPaginaDaMostrare($smarty->fetch('bookShuttle/arrivoInRoma/selezionePasseggeri.tpl'));
    }

    /** *************************************************** */
    private function riepilogoPrenotazione() {
        $smarty = &$this->smarty;

        $this->controlloSessioneValida();

        GestioneLingua::caricaDizionario($smarty, "BookShuttle_ArrivoInRoma");

        $arrivo = $this->getArrivo();

        $this->settaDatiDiBasePerLaVista();

        $descrizioneStruttura = $this->getDescrizioneStruttura();
        $descrizioneMezzoPiuOrario = $this->getDescrizioneMezzoPiuOrario();

        $smarty->assign("data", $arrivo->getData());
        $smarty->assign("struttura", $descrizioneStruttura);
        $smarty->assign("mezzoPiuOrario", $descrizioneMezzoPiuOrario);
        $smarty->assign("numeroAdulti", $arrivo->getNumeroAdulti());
        $smarty->assign("numeroAnimali", $arrivo->getNumeroAnimali());
        $smarty->assign("numeroBambiniDa3A6", $arrivo->getNumeroBambiniDa3A6());
        $smarty->assign("numeroBambiniDa6A12", $arrivo->getNumeroBambiniDa6A12());
        $smarty->assign("nomeContatto", $arrivo->getNomeContatto());
        $smarty->assign("cognomeContatto", $arrivo->getCognomeContatto());
        $smarty->assign("emailContatto", $arrivo->getEmailContatto());
        $smarty->assign("cellulareContatto", $arrivo->getCellulareContatto());

        // $smarty->assign("nomeDestinazioneShuttle", $arrivo->getNomeDestinazione());
        $smarty->assign("indirizzoDestinazioneShuttle", $arrivo->getIndirizzoDestinazione());

        $smarty->assign("moduloCodificato", urlencode($this->modulo));
        $smarty->assign("tokenCodificato", $_REQUEST["token"]);
        $smarty->assign("passoPrecedente", "passoC");
        $smarty->assign("prossimoPasso", "prenota");

        $this->setPaginaDaMostrare($smarty->fetch('bookShuttle/arrivoInRoma/riepilogo.tpl'));
    }

    private function getDescrizioneStruttura() {
        $arrivo = $this->getArrivo();
        $linguaImpostata = GestioneLingua::getLinguaImpostata();
        $struttura = StruttureDb::getStrutturaByID($this->hCtx, $arrivo->getStruttura(), $linguaImpostata);

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
        $this->controlloSessioneValida();

        $datiValidi = $this->validazioneFormDataPiuStruttura();

        if ($datiValidi) {
            $arrivo = $this->getArrivo();
            $arrivo->setData($_REQUEST["dataArrivo"]);
            $arrivo->setStruttura($_REQUEST["struttura"]);

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
            $arrivo = $this->getArrivo();
            $arrivo->setMezzoPiuOrario($_REQUEST["mezzoPiuOrario"]);
            $arrivo->setIndirizzoDestinazione($_REQUEST["indirizzoDestinazioneShuttle"]);

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
            $arrivo = $this->getArrivo();

            $arrivo->setNumeroAdulti($_REQUEST["numeroAdulti"]);
            $arrivo->setNumeroAnimali($_REQUEST["numeroAnimali"]);
            $arrivo->setNumeroBambiniDa3A6($_REQUEST["numeroBambiniAnni3Anni6"]);
            $arrivo->setNumeroBambiniDa6A12($_REQUEST["numeroBambiniAnni6Anni12"]);
            $arrivo->setNomeContatto($_REQUEST["nomeContatto"]);
            $arrivo->setCognomeContatto($_REQUEST["cognomeContatto"]);
            $arrivo->setEmailContatto($_REQUEST["emailContatto"]);
            $arrivo->setCellulareContatto($_REQUEST["cellulareContatto"]);

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
            $arrivo = $this->getArrivo();

            $arrivo->setNomeDestinazione($_REQUEST["nomeDestinazioneShuttle"]);
            $arrivo->setIndirizzoDestinazione($_REQUEST["indirizzoDestinazioneShuttle"]);

            $this->vaiRiepilogo($_REQUEST["token"]);
        } else {
            $this->vaiDestinazioneShuttle($_REQUEST["token"]);
        }
    }

    /**
     *
     */
    private function prenota()
    {
        $arrivo = $this->getArrivo();

        $this->controlloSessioneValida();

        $gestorePrenotazione = new GestorePrenotazione();

        $gestorePrenotazione->aggiungiPrenotazioneDiArrivoInRoma($this->hCtx, $arrivo);

        $this->inviaEmailRiepilogoAlCliente();
        $this->inviaEmailRiepilogoAllAmministratore();

        $token = $_REQUEST["token"];
        unset($_SESSION[$token]);

        $this->vaiFinePrenotazione();
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
        require_once ("validazione/ValidazioneFormArrivoDataPiuStruttura.php");

        $validatore = new ValidazioneFormArrivoDataPiuStruttura();

        return $validatore->datiValidi();
    }

    private function validazioneFormMezzoPiuOrario()
    {
        require_once ("validazione/ValidazioneFormArrivoMezzoPiuOrario.php");

        $validatore = new ValidazioneFormArrivoMezzoPiuOrario();

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

        GestioneLingua::caricaDizionario($smarty, "BookShuttle_ArrivoInRoma");

        $this->setPaginaDaMostrare($smarty->fetch('bookShuttle/arrivoInRoma/finePrenotazione.tpl'));
    }

    private function getDescrizioneMezzoPiuOrario()
    {
        $arrivo = $this->getArrivo();
        $linguaImpostata = GestioneLingua::getLinguaImpostata();
        $mezzoPiuOrario = MezziPiuOrariDb::getMezzoPiuOrarioByID($this->hCtx, $arrivo->getMezzoPiuOrario(), $linguaImpostata);

        return $mezzoPiuOrario["descrizione"];

    }

    private function inviaEmailRiepilogoAlCliente()
    {
        $smarty = &$this->smarty;

        $this->controlloSessioneValida();

        GestioneLingua::caricaDizionario($smarty, "BookShuttle_ArrivoInRoma");

        $arrivo = $this->getArrivo();

        $descrizioneStruttura = $this->getDescrizioneStruttura();
        $descrizioneMezzoPiuOrario = $this->getDescrizioneMezzoPiuOrario();

        $smarty->assign("data", $arrivo->getData());
        $smarty->assign("struttura", $descrizioneStruttura);
        $smarty->assign("mezzoPiuOrario", $descrizioneMezzoPiuOrario);
        $smarty->assign("numeroAdulti", $arrivo->getNumeroAdulti());
        $smarty->assign("numeroAnimali", $arrivo->getNumeroAnimali());
        $smarty->assign("numeroBambiniDa3A6", $arrivo->getNumeroBambiniDa3A6());
        $smarty->assign("numeroBambiniDa6A12", $arrivo->getNumeroBambiniDa6A12());
        $smarty->assign("nomeContatto", $arrivo->getNomeContatto());
        $smarty->assign("cognomeContatto", $arrivo->getCognomeContatto());
        $smarty->assign("emailContatto", $arrivo->getEmailContatto());
        $smarty->assign("cellulareContatto", $arrivo->getCellulareContatto());

        // $smarty->assign("nomeDestinazioneShuttle", $arrivo->getNomeDestinazione());
        $smarty->assign("indirizzoDestinazioneShuttle", $arrivo->getIndirizzoDestinazione());

        $corpoEmail = $smarty->fetch('bookShuttle/arrivoInRoma/emailRiepilogoPerIlCliente.tpl');

        // echo "<pre>"; print_r($corpoEmail); exit;

        $oggettoEmail = $this->smarty->get_config_vars("oggettoEmailRiepilogoPerIlCliente");

        @mail($arrivo->getEmailContatto(), $oggettoEmail, $corpoEmail);
    }

    private function inviaEmailRiepilogoAllAmministratore()
    {
        $smarty = &$this->smarty;

        $this->controlloSessioneValida();

        GestioneLingua::caricaDizionario($smarty, "BookShuttle_ArrivoInRoma");

        $arrivo = $this->getArrivo();

        $descrizioneStruttura = $this->getDescrizioneStruttura();
        $descrizioneMezzoPiuOrario = $this->getDescrizioneMezzoPiuOrario();

        $smarty->assign("data", $arrivo->getData());
        $smarty->assign("struttura", $descrizioneStruttura);
        $smarty->assign("mezzoPiuOrario", $descrizioneMezzoPiuOrario);
        $smarty->assign("numeroAdulti", $arrivo->getNumeroAdulti());
        $smarty->assign("numeroAnimali", $arrivo->getNumeroAnimali());
        $smarty->assign("numeroBambiniDa3A6", $arrivo->getNumeroBambiniDa3A6());
        $smarty->assign("numeroBambiniDa6A12", $arrivo->getNumeroBambiniDa6A12());
        $smarty->assign("nomeContatto", $arrivo->getNomeContatto());
        $smarty->assign("cognomeContatto", $arrivo->getCognomeContatto());
        $smarty->assign("emailContatto", $arrivo->getEmailContatto());
        $smarty->assign("cellulareContatto", $arrivo->getCellulareContatto());

        // $smarty->assign("nomeDestinazioneShuttle", $arrivo->getNomeDestinazione());
        $smarty->assign("indirizzoDestinazioneShuttle", $arrivo->getIndirizzoDestinazione());

        $corpoEmail = $smarty->fetch('bookShuttle/arrivoInRoma/emailRiepilogoPerAmministratore.tpl');

        $oggettoEmail = $this->smarty->get_config_vars("oggettoEmailRiepilogoPerAmministratore");

        // echo "<pre>"; print_r(EMAIL_AMMINISTRATORE); exit;

        @mail(EMAIL_AMMINISTRATORE, $oggettoEmail, $corpoEmail);
    }

    /** *************************************************** */
} //End of class definition.
?>