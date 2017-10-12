<?php
require_once("./phplibs/framework/BaseClass.php");
require_once("./phplibs/framework/Utility.php");
require_once("./phplibs/db/MezziPiuOrariDb.php");
require_once("./phplibs/db/ShuttleDb.php");
require_once("./phplibs/CaricatoreDomini.php");
require_once("./phplibs/framework/UtilityPerFileSystem.php");

/**
 * Definizione della classe di contesto
 * @package formazione
 */
class Shuttle extends BaseClass {

	function Shuttle(&$hCtx, &$hSessionCtx, $fNoWork=false ) {

		$this->BaseClass($hCtx, $hSessionCtx, "shuttle");
		$this->controlloFlusso();
	}

	public function controlloFlusso() {
		switch ($_REQUEST["operazione"]) {
            case "salva":
                $this->salva();
                break;
            case "nuova":
            	$this->nuova();
                break;
			case "modifica":
                $this->modifica();
				break;
		default:
			$this->lista();
			break;
		}
	}

	private function salva() {
        $datiValidi = $this->validazioneFormDettaglioMezzoPiuOrario();

        if ($datiValidi) {
            MezziPiuOrariDb::salvaMezzoPiuOrario($this->hCtx, $_REQUEST);
            Utility::redirect("?m=" . $this->modulo);
        } else {
            $this->consoleDettaglio($_REQUEST);
        }
    }

    private function validazioneFormDettaglioMezzoPiuOrario()
    {
        require_once ("./phplibs/validazione/validazioneFormDettaglioMezzoPiuOrario.php");

        $validatore = new ValidazioneFormDettaglioMezzoPiuOrario();

        return $validatore->datiValidi();
    }

	private function lista() {
		$smarty = &$this->smarty;

        GestioneLingua::caricaDizionario($smarty, "Amministrazione_Shuttle");
		GestioneLingua::caricaDizionario($smarty, "Amministrazione_ListaViaggi");

		$this->listaViaggi();

        $smarty->assign("modulo", $this->modulo);

		$this->setPaginaDaMostrare($smarty->fetch('amministrazione/shuttle/lista.tpl'));
	}

    private function listaViaggi() {
        $linguaImpostata = GestioneLingua::getLinguaImpostata();

        $listaElementi = ShuttleDb::listaViaggi($this->hCtx, $linguaImpostata);

        foreach ($listaElementi as $elemento) {
            $tipo = $this->smarty->get_config_vars($elemento["tipo"]);

            $elementoFe = $elemento;
            $elementoFe["tipo"] = $tipo;

            $listaElementiFe[] = $elementoFe;
		}

        // echo "<pre>"; print_r($listaElementiFe); exit;

		$this->smarty->assign("listaElementiFe", $listaElementiFe);
    }

    private function nuova()
    {
        $this->consoleDettaglio(null);
    }

    private function modifica()
    {
        $struttura = MezziPiuOrariDb::getMezzoPiuOrarioByIDCompleto($this->hCtx, $_REQUEST["id"]);

		$this->consoleDettaglio($struttura);
    }
    private function consoleDettaglio($mezzoPiuOrario)
    {
        $smarty = &$this->smarty;
        GestioneLingua::caricaDizionario($smarty, "AmministrazioneDettaglioaMezzoPiuOrario");

        // echo "<pre>"; print_r($mezzoPiuOrario); exit;

        if ($mezzoPiuOrario != null) {
            $smarty->assign("id", $mezzoPiuOrario["id"]);
            $smarty->assign("strutturaSelezionata", $mezzoPiuOrario["id_struttura"]);
            $smarty->assign("direzione", $mezzoPiuOrario["direzione"]);
/*
            if ($mezzoPiuOrario["direzione"] == "arrivo") {
                $smarty->assign("arrivoSelezionato", "selected");
                $smarty->assign("partenzaSelezionato", "");
            } else if ($mezzoPiuOrario["direzione"] == "partenza") {
                $smarty->assign("arrivoSelezionato", "partenza");
                $smarty->assign("partenzaSelezionato", "selected");
            }
*/
            $smarty->assign("direzione", $mezzoPiuOrario["direzione"]);


            if ($mezzoPiuOrario["attiva"] == "1") {
                $smarty->assign("attivoSelezionato", "selected");
                $smarty->assign("nonAttivoSelezionato", "");
            } else if ($mezzoPiuOrario["attiva"] == "0") {
                $smarty->assign("attivoSelezionato", "");
                $smarty->assign("nonAttivoSelezionato", "selected");
            }

            $smarty->assign("descrizioneIt", $mezzoPiuOrario["descrizione_it"]);
            $smarty->assign("descrizioneEn", $mezzoPiuOrario["descrizione_en"]);
            $smarty->assign("descrizioneAbjad", $mezzoPiuOrario["descrizione_abjad"]);
		} else {
            $smarty->assign("attivoSelezionato", "selected");
            $smarty->assign("nonAttivoSelezionato", "");
		}

        $smarty->assign("modulo", $this->modulo);

        CaricatoreDomini::listaStrutture($this->hCtx, $smarty, "strutture");
        CaricatoreDomini::listaDirezioni($smarty, "listaDirezioni");

        $this->setPaginaDaMostrare($smarty->fetch('amministrazione/mezziPiuOrari/dettaglio.tpl'));
    }
}
?>
