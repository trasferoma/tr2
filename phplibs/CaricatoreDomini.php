<?php
require_once ("db/StruttureDb.php");
require_once ("db/MezziPiuOrariDb.php");

class CaricatoreDomini
{
    static public function listaStrutture(&$hCtx, &$smarty, $sectionDiSmarty) {
        $linguaImpostata = GestioneLingua::getLinguaImpostata();
        $listaElementi = StruttureDb::listaCompleta($hCtx, $linguaImpostata);

        $listaValoriDominio = array();

        foreach ($listaElementi as $elemento) {
            $id = $elemento["id"];
            $descrizione = $elemento["descrizione"];

            $listaValoriDominio[$id] = $descrizione;
        }

        // echo "<pre>"; print_r($listaValoriDominio); exit;

        $smarty->assign($sectionDiSmarty, $listaValoriDominio);
    }


    static public function listaMezziPiuOrari(&$hCtx, &$smarty, $sectionDiSmarty, $idStruttura) {
        $linguaImpostata = GestioneLingua::getLinguaImpostata();
        $listaElementi = MezziPiuOrariDb::listaCompleta($hCtx, $linguaImpostata, $idStruttura);

        $listaValoriDominio = array();

        foreach ($listaElementi as $elemento) {
            $id = $elemento["id"];
            $descrizione = $elemento["descrizione"];

            $listaValoriDominio[$id] = $descrizione;
        }

        // echo "<pre>"; print_r($listaValoriDominio); exit;

        $smarty->assign($sectionDiSmarty, $listaValoriDominio);
    }


}
?>