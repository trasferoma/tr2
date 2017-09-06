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

		$this->BaseClass($hCtx, $hSessionCtx, "home");
		$this->controlloFlusso();
	}

	public function controlloFlusso() {
		switch ($_REQUEST["operazione"]) {
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
		$struttura = StruttureDb::getStrutturaByID($linguaImpostata);

		$this->consoleDettaglio($struttura);
    }
    private function consoleDettaglio($struttura)
    {
        $smarty = &$this->smarty;
        GestioneLingua::caricaDizionario($smarty, "AmministrazioneDettaglioaStrutture");

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

            $smarty->assign("descrizioneIt", $struttura["descrizioneIt"]);
            $smarty->assign("descrizioneEn", $struttura["descrizioneEn"]);
            $smarty->assign("descrizioneAbjad", $struttura["descrizioneAbjad"]);
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
