<?php
require_once ("./phplibs/db/PasseggeriDb.php");

class ShuttleDb {
    // ---------------------------------------
    static function getByViaggio(&$hCtx, $viaggio) {
        $mysqli = &$hCtx->hDBCtx;
        $idElemento = null;
        $dataViaggio = null;
        $idStruttura = null;
        $idMezzoPiuOrario = null;
        $tipoElemento = null;

        $query = "SELECT id, data_viaggio, id_struttura, id_mezzo_piu_orario, tipo FROM tr_shuttle WHERE data_viaggio = ? AND id_struttura = ? and id_mezzo_piu_orario = ? and tipo = ?";

        $stmt = $mysqli->prepare($query);

        if ($stmt == false) {
            die ("Errore nella query: " . $query);
        }

        $data = StrumentiDate::daFormatoItalianoInFormatoDb($viaggio->getData());
        $struttura = $viaggio->getStruttura();
        $mezzoPiuOrario = $viaggio->getMezzoPiuOrario();
        $tipo = $viaggio->getTipo();

        $stmt->bind_param('sdds', $data, $struttura, $mezzoPiuOrario, $tipo);

        $stmt->execute();

        $stmt->bind_result($idElemento, $dataViaggio, $idStruttura, $idMezzoPiuOrario, $tipoElemento);

        $shuttle = null;

        while ($stmt->fetch()) {
            $riga["id"] = $idElemento;
            $riga["data_viaggio"] = $dataViaggio;
            $riga["id_struttura"] = $idStruttura;
            $riga["id_mezzo_piu_orario"] = $idMezzoPiuOrario;
            $riga["tipo"] = $tipoElemento;

            $shuttle = $riga;
            $numeroPasseggeriPresenti = PasseggeriDb::getNumeroPasseggeriNelloShuttle($hCtx, $shuttle["id"]);
            $shuttle["numeroPasseggeriPresenti"] = $numeroPasseggeriPresenti;

            $listaShuttle[] = $shuttle;
        }

        /*
        $result = $stmt->get_result();

        $shuttle = null;

        while ($row = $result->fetch_assoc()) {
            $shuttle = $row;
            $numeroPasseggeriPresenti = PasseggeriDb::getNumeroPasseggeriNelloShuttle($hCtx, $shuttle["id"]);
            $shuttle["numeroPasseggeriPresenti"] = $numeroPasseggeriPresenti;

            $listaShuttle[] = $shuttle;
        }

        */
        $stmt->close();

        return $listaShuttle;
    }

    public static function creaShuttleByViaggio($hCtx, &$viaggio)
    {
        $mysqli = &$hCtx->hDBCtx;

        $listaColonne = "data_viaggio, id_struttura, id_mezzo_piu_orario, tipo";

        $sql = "INSERT INTO tr_shuttle ($listaColonne) values (?,?,?,?)";

        $stmt = $mysqli->prepare($sql);

        if ( false === $stmt ) {
            die('Errore Preparazione Query (creaShuttleByViaggio): ' . htmlspecialchars($mysqli->error));
        }

        // echo "<pre>"; print_r($campi); exit;
        $data = StrumentiDate::daFormatoItalianoInFormatoDb($viaggio->getData());
        $struttura = $viaggio->getStruttura();
        $mezzoPiuOrario = $viaggio->getMezzoPiuOrario();
        $tipo = $viaggio->getTipo();

        $stmt->bind_param('sdds',
            $data,
            $struttura,
            $mezzoPiuOrario,
            $tipo
        );

        $esito = $stmt->execute();

        if ($esito == false) {
            die('Errore Esecuzione Query: ' . htmlspecialchars($mysqli->error));
        }

        $stmt->close();

    }
} // end of class
?>
