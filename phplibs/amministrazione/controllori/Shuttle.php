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
        case "dettaglioViaggio":
            $this->dettaglioViaggio();
            break;
		default:
			$this->lista();
			break;
		}
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
            $elementoFe["tipoCodificato"] = $elementoFe["tipo"];
            $elementoFe["tipo"] = $tipo;

            $listaElementiFe[] = $elementoFe;
		}

        // echo "<pre>"; print_r($listaElementiFe); exit;

		$this->smarty->assign("listaElementiFe", $listaElementiFe);
    }

    /**
     *
     */
    private function dettaglioViaggio()
    {
        $smarty = &$this->smarty;

        GestioneLingua::caricaDizionario($smarty, "Amministrazione_Shuttle");
        GestioneLingua::caricaDizionario($smarty, "Amministrazione_DettaglioViaggio");

        $listaDati = $this->caricaDatiDelViaggio();

        // echo "<pre>"; print_r($listaDati); exit;

        $this->mostraInfoViaggio($listaDati);
        $this->mostraTuttiGliShuttle($listaDati);

        $smarty->assign("moduloCodificato", urlencode($this->modulo));

        $this->setPaginaDaMostrare($smarty->fetch('amministrazione/shuttle/dettaglio.tpl'));
    }

    private function mostraTuttiGliShuttle($listaDati) {
        reset($listaDati);
        $smarty = &$this->smarty;
        $smarty->assign("listaDati", $listaDati);
       // echo "<pre>"; print_r($listaDati); exit;

        /*

        foreach ($listaDati as $shuttle) {
            $this->mostraSingoloShuttle($shuttle);
        }
        */
    }

    /**
     *  [idShuttle] => 3
     *  [data_viaggio] => 2017-11-29
     *  [id_struttura] => 1
     *  [struttura] => Ciampino
     *  [id_mezzo_piu_orario] => 1
        [mezzo_piu_orario] => Descrizione 1
        [tipo] => arrivo_in_roma
        [passeggeri] => Array
        (
            [0] => Array
            (
                [id] => 11
                [id_shuttle] => 3
                [id_prenotazione] => 3
                [tipo] => adulto
                [nome_contatto] => yyy
                [cognome_contatto] => yyy
                [email_contatto] => yyy@yy.yy
                [cellulare_contatto] => 3474377011
                [indirizzo_destinazione] => xxxyyy
            )
     */
    private function mostraSingoloShuttle($shuttle) {
        $smarty = &$this->smarty;

        echo "<pre>"; print_r($shuttle); exit;
    }


    private function mostraInfoViaggio($listaDati) {
        $smarty = &$this->smarty;

        foreach ($listaDati as $shuttle) {
            $tipo = $this->smarty->get_config_vars($shuttle["tipo"]);

            $smarty->assign("shuttleDataViaggio", $shuttle["data_viaggio"]);
            $smarty->assign("shuttleStruttura", $shuttle["struttura"]);
            $smarty->assign("shuttleMezzoPiuOrario", $shuttle["mezzo_piu_orario"]);
            $smarty->assign("shuttleTipo", $tipo);
            break;
        }
    }

    private function caricaDatiDelViaggio()
    {

        $linguaImpostata = GestioneLingua::getLinguaImpostata();

        $listaShuttleDelViaggio = ShuttleDb::listaShuttleDelViaggio($this->hCtx, $linguaImpostata, $_REQUEST["dataViaggio"], $_REQUEST["idStruttura"], $_REQUEST["idMezzoPiuOrario"], $_REQUEST["tipo"]);

        foreach ($listaShuttleDelViaggio as $shuttle) {
            $listaPasseggeri = PasseggeriDb::getListaPasseggeriByIdShuttle($this->hCtx, $shuttle["idShuttle"]);
            // echo "<pre>"; print_r($listaPasseggeri); exit;
            $shuttle["passeggeri"] = $listaPasseggeri;
            $listaCompleta[] = $shuttle;
        }

        // $listaShuttleDelViaggio = ShuttleDb::getByViaggio($hCtx, $viaggio);

        return $listaCompleta;
    }
}
?>
