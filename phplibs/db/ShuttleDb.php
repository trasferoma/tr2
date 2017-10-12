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
        $stmt->store_result();

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

        $stmt->free_result();

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

    public static function listaViaggi($hCtx, $suffissoPerCampiLingua)
    {
        $mysqli = &$hCtx->hDBCtx;
        $dataViaggio = null;
        $idStruttura = null;
        $descrizioneStruttura = null;
        $idMezzoPiuOrario = null;
        $descrizioneMezzoPiuOrario = null;
        $tipoElemento = null;

        $query = "SELECT shu.data_viaggio, shu.id_struttura, stru.descrizione_$suffissoPerCampiLingua as struttura, shu.id_mezzo_piu_orario, mezzi.descrizione_$suffissoPerCampiLingua as mezzo_piu_orario, shu.tipo FROM tr_shuttle shu "
            . " inner join tr_strutture stru on stru.id = shu.id_struttura "
            . " inner join tr_mezzi_piu_orari mezzi on mezzi.id = shu.id_mezzo_piu_orario "
            . " where data_viaggio >= DATE_ADD(CURDATE(), INTERVAL -1 DAY) GROUP BY data_viaggio, id_struttura, id_mezzo_piu_orario, tipo";

        $stmt = $mysqli->prepare($query);

        if ($stmt == false) {
            die ("Errore nella query: " . $query);
        }

        $stmt->execute();

        $stmt->bind_result($dataViaggio, $idStruttura, $descrizioneStruttura, $idMezzoPiuOrario, $descrizioneMezzoPiuOrario, $tipoElemento);

        $viaggio = null;

        while ($stmt->fetch()) {
            $riga["data_viaggio"] = $dataViaggio;
            $riga["id_struttura"] = $idStruttura;
            $riga["struttura"] = $descrizioneStruttura;
            $riga["id_mezzo_piu_orario"] = $idMezzoPiuOrario;
            $riga["mezzo_piu_orario"] = $descrizioneMezzoPiuOrario;
            $riga["tipo"] = $tipoElemento;

            $viaggio = $riga;

            $listaViaggi[] = $viaggio;
        }

        $stmt->close();

        return $listaViaggi;
    }
} // end of class
?>
