<?php
require_once("./phplibs/framework/BaseClass.php");
require_once("./phplibs/framework/Utility.php");
require_once("./phplibs/db/StruttureDb.php");
require_once("./phplibs/CaricatoreDomini.php");
require_once("./phplibs/framework/UtilityPerFileSystem.php");

/**
 * Definizione della classe di contesto
 * @package formazione
 */
class Strutture extends BaseClass {

	function Strutture(&$hCtx, &$hSessionCtx, $fNoWork=false ) {

		$this->BaseClass($hCtx, $hSessionCtx, "strutture");
		$this->controlloFlusso();
	}

	public function controlloFlusso() {
		switch ($_REQUEST["operazione"]) {
            case "salva":
                $this->salvaStruttura();
                break;
            case "nuova":
            	$this->nuovaStruttura();
                break;
			case "modifica":
                $this->modificaStruttura();
				break;
		default:
			$this->lista();
			break;
		}
	}

	private function salvaStruttura() {
        $datiValidi = $this->validazioneFormDettaglioStruttura();

        if ($datiValidi) {
            StruttureDb::salvaStruttura($this->hCtx, $_REQUEST);
            Utility::redirect("?m=" . $this->modulo);
        } else {
            $this->consoleDettaglio($_REQUEST);
        }
    }

    private function validazioneFormDettaglioStruttura()
    {
        require_once ("./phplibs/validazione/ValidazioneFormDettaglioStruttura.php");

        $validatore = new ValidazioneFormDettaglioStruttura();

        return $validatore->datiValidi();
    }

	private function lista() {
		$smarty = &$this->smarty;

		GestioneLingua::caricaDizionario($smarty, "AmministrazioneListaStrutture");

		$this->listaStrutture();

		$this->setPaginaDaMostrare($smarty->fetch('amministrazione/strutture/lista.tpl'));
	}

    private function listaStrutture() {
        $linguaImpostata = GestioneLingua::getLinguaImpostata();
        $listaElementi = StruttureDb::listaCompleta($this->hCtx, $linguaImpostata);

        foreach ($listaElementi as $elemento) {
            $tipo = $this->smarty->get_config_vars($elemento["tipo"]);

            $elementoFe = $elemento;
            $elementoFe["tipo"] = $tipo;

            $listaElementiFe[] = $elementoFe;
		}

		$this->smarty->assign("listaElementiFe", $listaElementiFe);

		// echo "<pre>"; print_r($listaElementiFe); exit;
    }

    private function nuovaStruttura()
    {
        $this->consoleDettaglio(null);
    }

    private function modificaStruttura()
    {
        $linguaImpostata = GestioneLingua::getLinguaImpostata();
		$struttura = StruttureDb::getStrutturaByIDCompleta($this->hCtx, $_REQUEST["id"]);

		$this->consoleDettaglio($struttura);
    }
    private function consoleDettaglio($struttura)
    {
        $smarty = &$this->smarty;
        GestioneLingua::caricaDizionario($smarty, "AmministrazioneDettaglioaStrutture");

        // echo "<pre>"; print_r($struttura); exit;

        if ($struttura != null) {
            $smarty->assign("id", $struttura["id"]);
        	$smarty->assign("tipo", $struttura["tipo"]);

            if ($struttura["attiva"] == "1") {
                $smarty->assign("strutturaAttivaSelezionata", "selected");
                $smarty->assign("strutturaNonAttivaSelezionata", "");
            } else {
                $smarty->assign("strutturaAttivaSelezionata", "");
                $smarty->assign("strutturaNonAttivaSelezionata", "selected");
            }

            $smarty->assign("descrizioneIt", $struttura["descrizione_it"]);
            $smarty->assign("descrizioneEn", $struttura["descrizione_en"]);
            $smarty->assign("descrizioneAbjad", $struttura["descrizione_abjad"]);
		} else {
            $smarty->assign("strutturaAttivaSelezionata", "selected");
            $smarty->assign("strutturaNonAttivaSelezionata", "");
		}

        $smarty->assign("modulo", $this->modulo);

        CaricatoreDomini::listaTipiStruttura($smarty, "tipiStruttura");
        $this->setPaginaDaMostrare($smarty->fetch('amministrazione/strutture/dettaglio.tpl'));
    }
}
?>
